<?php

namespace ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription")
 * @ORM\Entity(repositoryClass="ProjectBundle\Repository\InscriptionRepository")
 */
class Inscription
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Utilisateur",cascade={"persist"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Classe",cascade={"persist"})
     */
    private $classes;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Promo",cascade={"persist"})
     */
    private $promos;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \ProjectBundle\Entity\Utilisateur $user
     *
     * @return Inscription
     */
    public function setUser(\ProjectBundle\Entity\Utilisateur $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \ProjectBundle\Entity\Utilisateur
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set classes
     *
     * @param \ProjectBundle\Entity\Classe $classes
     *
     * @return Inscription
     */
    public function setClasses(\ProjectBundle\Entity\Classe $classes = null)
    {
        $this->classes = $classes;

        return $this;
    }

    /**
     * Get classes
     *
     * @return \ProjectBundle\Entity\Classe
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Set promos
     *
     * @param \ProjectBundle\Entity\Promo $promos
     *
     * @return Inscription
     */
    public function setPromos(\ProjectBundle\Entity\Promo $promos = null)
    {
        $this->promos = $promos;

        return $this;
    }

    /**
     * Get promos
     *
     * @return \ProjectBundle\Entity\Promo
     */
    public function getPromos()
    {
        return $this->promos;
    }
}
