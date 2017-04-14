<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class vote
{
    /**
     * @ORM\Column(name="id_vote", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_vote;
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
     * @ORM\Column(name="vote", type="boolean")
     */
    private $vote;

    /**
     * @return mixed
     */
    public function getIdVote()
    {
        return $this->id_vote;
    }

    /**
     * @param mixed $id_vote
     */
    public function setIdVote($id_vote)
    {
        $this->id_vote = $id_vote;
    }

    /**
     * @return mixed
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * @param mixed $vote
     */
    public function setVote($vote)
    {
        $this->vote = $vote;
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


}
