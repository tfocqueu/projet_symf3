<?php
namespace ProjectBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Stage
 *
 * @ORM\Table(name="stage")
 * @ORM\Entity(repositoryClass="ProjectBundle\Repository\StageRepository")
 */
class Stage
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
     * @ORM\Column(name="Libelle_stage",type="string")
     */
    private $libelleStage;
    /**
     * @var string
     *
     * @ORM\Column(name="Libelle_stage",type="string")
     */
    private $libelleStage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee", type="datetimetz")
     */
    private $annee;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="datetimetz")
     */
    private $datedebut;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetimetz")
     */
    private $datefin;
    /**
     * @var string
     *
     * @ORM\Column(name="observation",type="string",length=500)
     */
    private $observation;
    /**
     * @var string
     *
     * @ORM\Column(name="observation",type="string",length=500)
     */
    private $observation;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Visite",cascade={"persist"})
     */
    private $visits;
    /**
     * @ORM\ManyToMany(targetEntity="ProjectBundle\Entity\Technologie",cascade={"persist"})
     */
    private $technos;
    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Entreprise",cascade={"persist"})
     */
    private $enteprises;
    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Utilisateur",cascade={"persist"})
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectBundle\Entity\Entreprise",cascade={"persist"})
     */
    private $enteprises;

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
     * Set annee
     *
     * @param \DateTime $annee
     *
     * @return Stage
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;
        return $this;
    }
    /**
     * Get annee
     *
     * @return \DateTime
     */
    public function getAnnee()
    {
        return $this->annee;
    }
    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Stage
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
        return $this;
    }
    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }
    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return Stage
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
        return $this;
    }
    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->technos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Set visits
     *
     * @param \ProjectBundle\Entity\Visite $visits
     *
     * @return Stage
     */
    public function setVisits(\ProjectBundle\Entity\Visite $visits = null)
    {
        $this->visits = $visits;
        return $this;
    }
    /**
     * Get visits
     *
     * @return \ProjectBundle\Entity\Visite
     */
    public function getVisits()
    {
        return $this->visits;
    }
    /**
     * Add techno
     *
     * @param \ProjectBundle\Entity\Technologie $techno
     *
     * @return Stage
     */
    public function addTechno(\ProjectBundle\Entity\Technologie $techno)
    {
        $this->technos[] = $techno;
        return $this;
    }
    /**
     * Remove techno
     *
     * @param \ProjectBundle\Entity\Technologie $techno
     */
    public function removeTechno(\ProjectBundle\Entity\Technologie $techno)
    {
        $this->technos->removeElement($techno);
    }
    /**
     * Get technos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTechnos()
    {
        return $this->technos;
    }
<<<<<<< HEAD

=======
>>>>>>> feature/showentreprise
    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return Stage
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;
<<<<<<< HEAD

        return $this;
    }

=======
        return $this;
    }
>>>>>>> feature/showentreprise
    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }
<<<<<<< HEAD

=======
>>>>>>> feature/showentreprise
    /**
     * Set enteprises
     *
     * @param \ProjectBundle\Entity\Entreprise $enteprises
     *
     * @return Stage
     */
    public function setEnteprises(\ProjectBundle\Entity\Entreprise $enteprises = null)
    {
        $this->enteprises = $enteprises;
<<<<<<< HEAD

        return $this;
    }

=======
        return $this;
    }
>>>>>>> feature/showentreprise
    /**
     * Get enteprises
     *
     * @return \ProjectBundle\Entity\Entreprise
     */
    public function getEnteprises()
    {
        return $this->enteprises;
    }
<<<<<<< HEAD

=======
>>>>>>> feature/showentreprise
    /**
     * Set libelleStage
     *
     * @param string $libelleStage
     *
     * @return Stage
     */
    public function setLibelleStage($libelleStage)
    {
        $this->libelleStage = $libelleStage;
<<<<<<< HEAD

        return $this;
    }

=======
        return $this;
    }
>>>>>>> feature/showentreprise
    /**
     * Get libelleStage
     *
     * @return string
     */
    public function getLibelleStage()
    {
        return $this->libelleStage;
    }
<<<<<<< HEAD

=======
>>>>>>> feature/showentreprise
    public function __toString()
    {
        return $this->libelleStage;
    }
<<<<<<< HEAD
=======

    /**
     * Set utilisateur
     *
     * @param \ProjectBundle\Entity\Utilisateur $utilisateur
     *
     * @return Stage
     */
    public function setUtilisateur(\ProjectBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \ProjectBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
>>>>>>> feature/showentreprise
}
