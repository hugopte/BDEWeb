<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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



}
