<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class photo
{
    /**
     * @ORM\Column(name="id_Photo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_Photo;

    /**
     * @ORM\Column(name="url_photo", type="text")
     */
    private $url_Photo;

    /**
     * @ORM\Column(name="alt_photo", type="text")
     */
    private $alt_Photo;

    /**
     * @return mixed
     */
    public function getIdPhoto()
    {
        return $this->id_Photo;
    }

    /**
     * @param mixed $id_Photo
     */
    public function setIdPhoto($id_Photo)
    {
        $this->id_Photo = $id_Photo;
    }

    /**
     * @return mixed
     */
    public function getUrlPhoto()
    {
        return $this->url_Photo;
    }

    /**
     * @param mixed $url_Photo
     */
    public function setUrlPhoto($url_Photo)
    {
        $this->url_Photo = $url_Photo;
    }

    /**
     * @return mixed
     */
    public function getAltPhoto()
    {
        return $this->alt_Photo;
    }

    /**
     * @param mixed $alt_Photo
     */
    public function setAltPhoto($alt_Photo)
    {
        $this->alt_Photo = $alt_Photo;
    }




}
