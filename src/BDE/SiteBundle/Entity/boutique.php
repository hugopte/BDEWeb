<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="boutique")
 * @ORM\Entity(repositoryClass="BDE\SiteBundle\Entity\Repository\boutiqueRepository")
 */
class boutique
{
    /**
     * @ORM\Column(name="id_article", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="nom_article", type="text")
     */
    private $nomArticle;

    /**
     * @ORM\Column(name="prix_article", type="integer")
     */
    private $prixArticle;


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
     * Set nomArticle
     *
     * @param string $nomArticle
     * @return boutique
     */
    public function setNomArticle($nomArticle)
    {
        $this->nomArticle = $nomArticle;

        return $this;
    }

    /**
     * Get nomArticle
     *
     * @return string 
     */
    public function getNomArticle()
    {
        return $this->nomArticle;
    }

    /**
     * Set prixArticle
     *
     * @param string $prixArticle
     * @return boutique
     */
    public function setPrixArticle($prixArticle)
    {
        $this->prixArticle = $prixArticle;

        return $this;
    }

    /**
     * Get prixArticle
     *
     * @return string 
     */
    public function getPrixArticle()
    {
        return $this->prixArticle;
    }
}
