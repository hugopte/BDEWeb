<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class vote
{
    /**
     * @ORM\Column(name="id_users", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_vote;



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


}
