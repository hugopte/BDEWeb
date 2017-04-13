<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


class commentaire
{
    /**
     * @ORM\Column(name="id_commentaire", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_commentaire;

    /**
     * @ORM\Column(name="text_Comment", type="text")
     */
    private $text_Comment;




}
