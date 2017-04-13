<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
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
    /**
     * @return mixed
     */
    public function getIdCommentaire()
    {
        return $this->id_commentaire;
    }

    /**
     * @param mixed $id_commentaire
     */
    public function setIdCommentaire($id_commentaire)
    {
        $this->id_commentaire = $id_commentaire;
    }

    /**
     * @return mixed
     */
    public function getTextComment()
    {
        return $this->text_Comment;
    }

    /**
     * @param mixed $text_Comment
     */
    public function setTextComment($text_Comment)
    {
        $this->text_Comment = $text_Comment;
    }







}
