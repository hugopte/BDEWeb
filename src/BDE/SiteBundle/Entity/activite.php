<?php

namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="activite")
 * @ORM\Entity(repositoryClass="BDE\SiteBundle\Entity\Repository\activiteRepository")
 */
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
     * @ORM\Column(name="date_activite", type="string")
     */
    private $date_activite;

    /**
     * @ORM\Column(name="validation_activite", type="boolean")
     */
    private $validation_activite;


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
    public function getNomActivite()
    {
        return $this->nom_activite;
    }

    /**
     * @param mixed $nom_activite
     */
    public function setNomActivite($nom_activite)
    {
        $this->nom_activite = $nom_activite;
    }

    /**
     * @return mixed
     */
    public function getDescriptionActivite()
    {
        return $this->description_activite;
    }

    /**
     * @param mixed $description_activite
     */
    public function setDescriptionActivite($description_activite)
    {
        $this->description_activite = $description_activite;
    }

    /**
     * @return mixed
     */
    public function getDateActivite()
    {
        return $this->date_activite;
    }

    /**
     * @param mixed $date_activite
     */
    public function setDateActivite($date_activite)
    {
        $this->date_activite = $date_activite;
    }

    /**
     * @return mixed
     */
    public function getValidationActivite()
    {
        return $this->validation_activite;
    }

    /**
     * @param mixed $validation_activite
     */
    public function setValidationActivite($validation_activite)
    {
        $this->validation_activite = $validation_activite;
    }
    /**
     * @ORM\Column(name="id_activite", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */



}
