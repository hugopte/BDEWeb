<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BDE\SiteBundle\Entity\photo;

/**
 * @ORM\Entity
 */
class jaime
{
    /**
     * @ORM\Column(name="id_jaime", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_jaime;

    /**
     * @ORM\OneToOne(targetEntity="photo",cascade={"persist"} )
     * @ORM\JoinColumn(name="id_photo",referencedColumnName="id_photo")
     **/
    private $photo;

    /**
     * @ORM\OneToOne(targetEntity="users",cascade={"persist"} )
     * @ORM\JoinColumn(name="id_users",referencedColumnName="id_users")
     **/
    private $users;

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }


    /**
     * @return mixed
     */
    public function getIdJaime()
    {
        return $this->id_jaime;
    }

    /**
     * @param mixed $id_jaime
     */
    public function setIdJaime($id_jaime)
    {
        $this->id_jaime = $id_jaime;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }




}
