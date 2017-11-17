<?php

namespace ProjectBundle\Event;

use Symfony\Component\Cache\Adapter\RedisAdapter;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;

class Fail implements EventSubscriberInterface
{
    private $redisAdapter;

    public function __construct(RedisAdapter $redisAdapter)
    {
        $this->redisAdapter = $redisAdapter;
    }

    public static function getSubscribedEvents()
    {
        return [
            AuthenticationEvents::AUTHENTICATION_FAILURE => 'onAuthenticationFailure',
        ];
    }

    public function onAuthenticationFailure(AuthenticationFailureEvent $event)
    {
        $username = $event->getAuthenticationToken()->getUsername();
        $fail2ban = $this->redisAdapter->getItem($this->request->getClientIp());
        $list = ($fail2ban->isHit()) ? $fail2ban->get() : [];
        if (!isset($list[$username])) {
            $list[$username] = 1;
        } else {
            $list[$username]++;
        }

        $fail2ban->set($list);

        $fail2ban->expiresAt(new \DateTime('+ 1 hour'));
        $this->redisAdapter->save($fail2ban);
    }
}