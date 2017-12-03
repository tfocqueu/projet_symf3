<?php

namespace ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="ProjectBundle\Repository\ClasseRepository")
 */
class Classe
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\ManyToMany(targetEntity="ProjectBundle\Entity\Promo",cascade={"persist"})
     */
    private $laPromo;

    /**
     * @ORM\ManyToMany(targetEntity="ProjectBundle\Entity\Utilisateur",cascade={"persist"})
     */
    private $lesEleves;

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Classe
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Classe
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    public function __toString()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->laPromo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add laPromo
     *
     * @param \ProjectBundle\Entity\Promo $laPromo
     *
     * @return Classe
     */
    public function addLaPromo(\ProjectBundle\Entity\Promo $laPromo)
    {
        $this->laPromo[] = $laPromo;

        return $this;
    }

    /**
     * Remove laPromo
     *
     * @param \ProjectBundle\Entity\Promo $laPromo
     */
    public function removeLaPromo(\ProjectBundle\Entity\Promo $laPromo)
    {
        $this->laPromo->removeElement($laPromo);
    }

    /**
     * Get laPromo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLaPromo()
    {
        return $this->laPromo;
    }

    /**
     * Add lesElefe
     *
     * @param \ProjectBundle\Entity\Utilisateur $lesElefe
     *
     * @return Classe
     */
    public function addLesElefe(\ProjectBundle\Entity\Utilisateur $lesElefe)
    {
        $this->lesEleves[] = $lesElefe;

        return $this;
    }

    /**
     * Remove lesElefe
     *
     * @param \ProjectBundle\Entity\Utilisateur $lesElefe
     */
    public function removeLesElefe(\ProjectBundle\Entity\Utilisateur $lesElefe)
    {
        $this->lesEleves->removeElement($lesElefe);
    }

    /**
     * Get lesEleves
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLesEleves()
    {
        return $this->lesEleves;
    }
}
