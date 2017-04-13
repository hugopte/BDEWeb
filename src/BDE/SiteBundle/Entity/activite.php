<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * activite
 */
class activite
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomActivite;

    /**
     * @var string
     */
    private $descriptionActivite;

    /**
     * @var \DateTime
     */
    private $dateActivite;

    /**
     * @var bool
     */
    private $validationActivite;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomActivite
     *
     * @param string $nomActivite
     * @return activite
     */
    public function setNomActivite($nomActivite)
    {
        $this->nomActivite = $nomActivite;

        return $this;
    }

    /**
     * Get nomActivite
     *
     * @return string 
     */
    public function getNomActivite()
    {
        return $this->nomActivite;
    }

    /**
     * Set descriptionActivite
     *
     * @param string $descriptionActivite
     * @return activite
     */
    public function setDescriptionActivite($descriptionActivite)
    {
        $this->descriptionActivite = $descriptionActivite;

        return $this;
    }

    /**
     * Get descriptionActivite
     *
     * @return string 
     */
    public function getDescriptionActivite()
    {
        return $this->descriptionActivite;
    }

    /**
     * Set dateActivite
     *
     * @param \DateTime $dateActivite
     * @return activite
     */
    public function setDateActivite($dateActivite)
    {
        $this->dateActivite = $dateActivite;

        return $this;
    }

    /**
     * Get dateActivite
     *
     * @return \DateTime 
     */
    public function getDateActivite()
    {
        return $this->dateActivite;
    }

    /**
     * Set validationActivite
     *
     * @param boolean $validationActivite
     * @return activite
     */
    public function setValidationActivite($validationActivite)
    {
        $this->validationActivite = $validationActivite;

        return $this;
    }

    /**
     * Get validationActivite
     *
     * @return boolean 
     */
    public function getValidationActivite()
    {
        return $this->validationActivite;
    }
}
