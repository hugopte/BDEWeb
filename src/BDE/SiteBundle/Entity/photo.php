<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * photo
 */
class photo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $urlPhoto;

    /**
     * @var string
     */
    private $altPhoto;


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
     * Set urlPhoto
     *
     * @param string $urlPhoto
     * @return photo
     */
    public function setUrlPhoto($urlPhoto)
    {
        $this->urlPhoto = $urlPhoto;

        return $this;
    }

    /**
     * Get urlPhoto
     *
     * @return string 
     */
    public function getUrlPhoto()
    {
        return $this->urlPhoto;
    }

    /**
     * Set altPhoto
     *
     * @param string $altPhoto
     * @return photo
     */
    public function setAltPhoto($altPhoto)
    {
        $this->altPhoto = $altPhoto;

        return $this;
    }

    /**
     * Get altPhoto
     *
     * @return string 
     */
    public function getAltPhoto()
    {
        return $this->altPhoto;
    }
}
