<?php

namespace ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity(repositoryClass="ProjectBundle\Repository\EntrepriseRepository")
 */
class Entreprise
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="chiffreaffaires", type="float")
     *
     * @Assert\Type("float")
     */
    private $chiffreaffaires;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Utilisateur",cascade={"persist"})
     */
    private $users;

    /**
     * @ORM\ManyToOne (targetEntity="ProjectBundle\Entity\EntrepriseType",cascade={"persist"})
     */
    private $EntrepriseType;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Entreprise
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set chiffreaffaires
     *
     * @param integer $chiffreaffaires
     *
     * @return Entreprise
     */
    public function setChiffreaffaires($chiffreaffaires)
    {
        $this->chiffreaffaires = $chiffreaffaires;

        return $this;
    }

    /**
     * Get chiffreaffaires
     *
     * @return int
     */
    public function getChiffreaffaires()
    {
        return $this->chiffreaffaires;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Entreprise
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Entreprise
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Entreprise
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    public function __toString()
    {
        return $this->nom;
    }

    /**
     * Set users
     *
     * @param \ProjectBundle\Entity\Utilisateur $users
     *
     * @return Entreprise
     */
    public function setUsers(\ProjectBundle\Entity\Utilisateur $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \ProjectBundle\Entity\Utilisateur
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set entrepriseType
     *
     * @param \ProjectBundle\Entity\EntrepriseType $entrepriseType
     *
     * @return Entreprise
     */
    public function setEntrepriseType(\ProjectBundle\Entity\EntrepriseType $entrepriseType = null)
    {
        $this->EntrepriseType = $entrepriseType;

        return $this;
    }

    /**
     * Get entrepriseType
     *
     * @return \ProjectBundle\Entity\EntrepriseType
     */
    public function getEntrepriseType()
    {
        return $this->EntrepriseType;
    }
}
