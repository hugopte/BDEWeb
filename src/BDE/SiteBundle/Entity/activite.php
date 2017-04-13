<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


class activite
{
    /**
     * @ORM\Column(name="id_activite", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_activite;

    /**
     * @ORM\Column(name="nom_activite", type="text")
     */
    private $nom_activite;

    /**
     * @ORM\Column(name="description_activite", type="text")
     */
    private $description_activite;

    /**
     * @ORM\Column(name="date_activite", type="date")
     */
    private $date_activite;

    /**
     * @ORM\Column(name="validation_activite", type="boolean")
     */
    private $validation_activite;






}
