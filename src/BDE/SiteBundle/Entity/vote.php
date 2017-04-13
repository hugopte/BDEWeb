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




}
