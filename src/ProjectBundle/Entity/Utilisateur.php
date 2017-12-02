<?php

namespace ProjectBundle\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping\AttributeOverrides;
use Doctrine\ORM\Mapping\AttributeOverride;
use ProjectBundle\Entity\Stage;
use ProjectBundle\Entity\Entreprise;
use ProjectBundle\Entity\Diplome;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="ProjectBundle\Repository\UtilisateurRepository")
 ***  @AttributeOverrides({
 *     @AttributeOverride(name="emailCanonical",
 *         column=@ORM\Column(
 *             name="emailCanonical",
 *             type="string",
 *             length=255,
 *             nullable=true
 *         )
 *     ),
 *     @AttributeOverride(name="email",
 *         column=@ORM\Column(
 *             name="email",
 *             type="string",
 *             length=255,
 *             nullable=true
 *         )
 *     ),
 *     @AttributeOverride(name="prenom",
 *         column=@ORM\Column(
 *             name="prenom",
 *             type="string",
 *             length=255,
 *             nullable=true
 *         )
 *     ),
 *     @AttributeOverride(name="usernameCanonical",
 *         column=@ORM\Column(
 *             name="usernameCanonical",
 *             type="string",
 *             length=255,
 *             nullable=true
 *         )
 *     ),
 *     @AttributeOverride(name="password",
 *         column=@ORM\Column(
 *             name="password",
 *             type="string",
 *             length=255,
 *             nullable=true
 *         )
 *     ),
 *     @AttributeOverride(name="adresse",
 *         column=@ORM\Column(
 *             name="adresse",
 *             type="string",
 *             length=255,
 *             nullable=true
 *         )
 *     ),
 *     @AttributeOverride(name="anneeobtention",
 *         column=@ORM\Column(
 *             name="anneeobtention",
 *             type="integer",
 *             nullable=true
 *         )
 *     ),
 * })
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
    protected $adresse;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Diplome",cascade={"persist"})
     */
    protected $diplomes;

    /**
     * @ORM\ManyToMany(targetEntity="ProjectBundle\Entity\Stage",cascade={"persist"})
     */
    protected $stages;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Entreprise",cascade={"persist"})
     */
    protected $entreprises;



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
     * Set entreprises
     *
     * @param \ProjectBundle\Entity\Entreprise $entreprises
     *
     * @return Utilisateur
     */
    public function setEntreprises(Entreprise $entreprises = null)
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

    /**
     * Set diplomes
     *
     * @param \ProjectBundle\Entity\Diplome $diplomes
     *
     * @return Utilisateur
     */
    public function setDiplomes(Diplome $diplomes = null)
    {
        $this->diplomes = $diplomes;

        return $this;
    }

    /**
     * Get diplomes
     *
     * @return \ProjectBundle\Entity\Diplome
     */
    public function getDiplomes()
    {
        return $this->diplomes;
    }

    /**
     * Add stage
     *
     * @param \ProjectBundle\Entity\Stage $stage
     *
     * @return Utilisateur
     */
    public function addStage(\ProjectBundle\Entity\Stage $stage)
    {
        $this->stages[] = $stage;

        return $this;
    }

    /**
     * Remove stage
     *
     * @param \ProjectBundle\Entity\Stage $stage
     */
    public function removeStage(\ProjectBundle\Entity\Stage $stage)
    {
        $this->stages->removeElement($stage);
    }

    /**
     * Get stages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStages()
    {
        return $this->stages;
    }
}
