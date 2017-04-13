<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class inscription
{
    /**
     * @ORM\Column(name="id_users", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_inscription;

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



}
