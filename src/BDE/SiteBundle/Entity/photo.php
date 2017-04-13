<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class photo
{
    /**
     * @ORM\Column(name="id_Photo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_Photo;

    /**
     * @ORM\Column(name="url_photo", type="text")
     */
    private $url_Photo;

    /**
     * @ORM\Column(name="alt_photo", type="text")
     */
    private $alt_Photo;




}
