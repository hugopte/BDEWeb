<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


class commentaire
{
    /**
     * @ORM\Column(name="id_users", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_commentaire;


    private $textComment;




}
