<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


class activite
{
    /**
     * @ORM\Column(name="id_users", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_activite;


    private $nomActivite;


    private $descriptionActivite;


    private $dateActivite;


    private $validation_Activite;






}
