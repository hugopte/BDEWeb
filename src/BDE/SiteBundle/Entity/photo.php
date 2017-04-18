<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="photo")
 * @ORM\Entity(repositoryClass="BDE\SiteBundle\Entity\Repository\photoRepository")
 */
class photo
{
    /**
     * @ORM\Column(name="id_photo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_photo;

    /**
     * @ORM\OneToOne(targetEntity="users",cascade={"persist"} )
     * @ORM\JoinColumn(name="id_users",referencedColumnName="id_users")
     **/
    private $id_users;
    /**
     * @ORM\ManyToOne(targetEntity="activite",cascade={"persist"} )
     * @ORM\JoinColumn(name="id_activite",referencedColumnName="id_activite")
     **/

    private $id_activite;


    /**
     * @ORM\Column(name="url_photo", type="text")
     */
    private $url_photo;

    /**
     * @ORM\Column(name="alt_photo", type="text")
     */
    private $alt_photo;

    /**
     * @return mixed
     */
    public function getIdPhoto()
    {
        return $this->id_photo;
    }

    /**
     * @param mixed $id_photo
     */
    public function setIdPhoto($id_photo)
    {
        $this->id_photo = $id_photo;
    }

    /**
     * @return mixed
     */
    public function getUrlPhoto()
    {
        return $this->url_photo;
    }

    /**
     * @param mixed $url_photo
     */
    public function setUrlPhoto($url_photo)
    {
        $this->url_photo = $url_photo;
    }

    /**
     * @return mixed
     */
    public function getAltPhoto()
    {
        return $this->alt_photo;
    }

    /**
     * @return mixed
     */
    public function getIdUsers()
    {
        return $this->id_users;
    }

    /**
     * @param mixed $id_users
     */
    public function setIdUsers($id_users)
    {
        $this->id_users = $id_users;
    }

    /**
     * @return mixed
     */
    public function getIdActivite()
    {
        return $this->id_activite;
    }

    /**
     * @param mixed $id_activite
     */
    public function setIdActivite($id_activite)
    {
        $this->id_activite = $id_activite;
    }

    /**
     * @param mixed $alt_photo
     */
    public function setAltPhoto($alt_photo)
    {
        $this->alt_photo = $alt_photo;
    }








}
