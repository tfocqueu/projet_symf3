<?php

namespace ProjectBundle\Entity;

use Doctrine\ORM\Query\Expr\Base;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="ProjectBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;



    /**
     * @ORM\ManyToMany(targetEntity="ProjectBundle\Entity\Diplome",cascade={"persist"})
     */
    private $diplomes;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Stage",cascade={"persist"})
     */
    private $stages;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Entreprise",cascade={"persist"})
     */
    private $entreprises;



    /**
     * @var string
     *
     * @ORM\Column(name="anneeobtention", type="integer")
     */
    private $anneeobtention;


    public function __construct()
    {
        parent::__construct();
    }


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
     * @return Utilisateur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Utilisateur
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
     * Set anneeobtention
     *
     * @param integer $anneeobtention
     *
     * @return Utilisateur
     */
    public function setAnneeobtention($anneeobtention)
    {
        $this->anneeobtention = $anneeobtention;

        return $this;
    }

    /**
     * Get anneeobtention
     *
     * @return integer
     */
    public function getAnneeobtention()
    {
        return $this->anneeobtention;
    }

    

    /**
     * Add diplome
     *
     * @param \ProjectBundle\Entity\Diplome $diplome
     *
     * @return Utilisateur
     */
    public function addDiplome(\ProjectBundle\Entity\Diplome $diplome)
    {
        $this->diplomes[] = $diplome;

        return $this;
    }

    /**
     * Remove diplome
     *
     * @param \ProjectBundle\Entity\Diplome $diplome
     */
    public function removeDiplome(\ProjectBundle\Entity\Diplome $diplome)
    {
        $this->diplomes->removeElement($diplome);
    }

    /**
     * Get diplomes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDiplomes()
    {
        return $this->diplomes;
    }

    /**
     * Set stages
     *
     * @param \ProjectBundle\Entity\Stage $stages
     *
     * @return Utilisateur
     */
    public function setStages(\ProjectBundle\Entity\Stage $stages = null)
    {
        $this->stages = $stages;

        return $this;
    }

    /**
     * Get stages
     *
     * @return \ProjectBundle\Entity\Stage
     */
    public function getStages()
    {
        return $this->stages;
    }

    /**
     * Set entreprises
     *
     * @param \ProjectBundle\Entity\Entreprise $entreprises
     *
     * @return Utilisateur
     */
    public function setEntreprises(\ProjectBundle\Entity\Entreprise $entreprises = null)
    {
        $this->entreprises = $entreprises;

        return $this;
    }

    /**
     * Get entreprises
     *
     * @return \ProjectBundle\Entity\Entreprise
     */
    public function getEntreprises()
    {
        return $this->entreprises;
    }
}
