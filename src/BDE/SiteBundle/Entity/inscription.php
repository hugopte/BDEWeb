<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class inscription
{
    /**
     * @ORM\Column(name="id_inscription", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_inscription;

    /**
     * @return mixed
     */


    /**
     * @ORM\OneToOne(targetEntity="users",cascade={"persist"} )
     * @ORM\JoinColumn(name="id_users",referencedColumnName="id_users")
     **/
    private $id_users;
    /**
     * @ORM\OneToOne(targetEntity="activite",cascade={"persist"} )
     * @ORM\JoinColumn(name="id_activite",referencedColumnName="id_activite")
     **/

    private $id_activite;


    /**
     * @return mixed
     */
    public function getIdInscription()
    {
        return $this->id_inscription;
    }

    /**
     * @param mixed $id_inscription
     */
    public function setIdInscription($id_inscription)
    {
        $this->id_inscription = $id_inscription;
    }
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


}
