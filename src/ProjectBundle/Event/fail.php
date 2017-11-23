<?php

namespace ProjectBundle\Event;

use Doctrine\Common\Persistence\ObjectManager;
use ProjectBundle\Entity\ControleForceBrute;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Matcher\RequestMatcherInterface;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;

class fail implements EventSubscriberInterface
{
    const MAX_LOGIN_FAILURE_ATTEMPTS = 5;
    private $request;
    private $requestStack;
    private $router;
    private $em;

    public function __construct( RequestStack $requestStack, ObjectManager $em)
    {
        $this->requestStack = $requestStack;
        $this->em = $em;

    }

    public static function getSubscribedEvents()
    {
        return [
            AuthenticationEvents::AUTHENTICATION_FAILURE => 'onAuthenticationFailure',
            KernelEvents::REQUEST => ['beforeFirewall', 10]
        ];
    }

    public function onAuthenticationFailure(AuthenticationFailureEvent $event)
    {
        $ip = $this->requestStack->getCurrentRequest()->getClientIp();
        $date = new \DateTime();
        $controleForceBrute = new ControleForceBrute();
        $controleForceBrute->setIp($ip);
        $controleForceBrute->setDate($date);
        $this->em->persist($controleForceBrute);
        $this->em->flush();
    }

    public function beforeFirewall(GetResponseEvent $event)
    {
        $ip = $this->requestStack->getCurrentRequest()->getClientIp();
        $date = new \DateTime();
        $dateBefore = new \DateTime();
        $dateBefore->modify('-1 hour');

        $FailureAuth = $this->em->getRepository(ControleForceBrute::class)->compteIp($ip, $date, $dateBefore);
        $nbFailure = count($FailureAuth);

        $dateBan = $this->em->getRepository(ControleForceBrute::class)->getDate($ip);

        var_dump($date);
        var_dump($dateBan);


        if ($nbFailure >= 3 && ($date >= $dateBan) ){
            throw new HttpException(
                429,
                'Votre Ip est ban pendant 12 heures.'
            );
        }

    }
}