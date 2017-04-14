<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="BDE\SiteBundle\Entity\Repository\commentaireRepository")
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
     * @ORM\ManyToOne(targetEntity="users",cascade={"persist"} )
     * @ORM\JoinColumn(name="id_users",referencedColumnName="id_users")
     **/
    private $id_users;

    /**
     * @ORM\OneToOne(targetEntity="activite",cascade={"persist"} )
     * @ORM\JoinColumn(name="id_activite",referencedColumnName="id_activite")
     **/
    private $id_activite;


    /**
     * @ORM\Column(name="date_comment", type="date")
     */
    private $date_comment;

    /**
     * @ORM\Column(name="text_comment", type="text")
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

    /**
     * @return mixed
     */
    public function getIdUsers()
    {
        return $this->id_users;
    }

    /**
     * @param mixed $id_users
     */
    public function setIdUsers($id_users)
    {
        $this->id_users = $id_users;
    }

    /**
     * @return mixed
     */
    public function getIdActivite()
    {
        return $this->id_activite;
    }

    /**
     * @param mixed $id_activite
     */
    public function setIdActivite($id_activite)
    {
        $this->id_activite = $id_activite;
    }

    /**
     * @return mixed
     */
    public function getDateComment()
    {
        return $this->date_comment;
    }

    /**
     * @param mixed $date_comment
     */
    public function setDateComment($date_comment)
    {
        $this->date_comment = $date_comment;
    }







}
