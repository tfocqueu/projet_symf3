<?php

namespace ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Technologie
 *
 * @ORM\Table(name="technologie")
 * @ORM\Entity(repositoryClass="ProjectBundle\Repository\TechnologieRepository")
 */
class Technologie
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
     * @ORM\Column(name="libelleTechnologie", type="string", length=255)
     */
    private $libelleTechnologie;


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
     * Set libelleTechnologie
     *
     * @param string $libelleTechnologie
     *
     * @return Technologie
     */
    public function setLibelleTechnologie($libelleTechnologie)
    {
        $this->libelleTechnologie = $libelleTechnologie;

        return $this;
    }

    /**
     * Get libelleTechnologie
     *
     * @return string
     */
    public function getLibelleTechnologie()
    {
        return $this->libelleTechnologie;
    }

    public function __toString()
    {
        return $this->libelleTechnologie;
    }
}
