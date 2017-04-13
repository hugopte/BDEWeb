<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * commentaire
 */
class commentaire
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $textComment;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set textComment
     *
     * @param string $textComment
     * @return commentaire
     */
    public function setTextComment($textComment)
    {
        $this->textComment = $textComment;

        return $this;
    }

    /**
     * Get textComment
     *
     * @return string 
     */
    public function getTextComment()
    {
        return $this->textComment;
    }
}
