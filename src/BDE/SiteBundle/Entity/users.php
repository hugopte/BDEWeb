<?php
namespace BDE\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="BDE\SiteBundle\Entity\Repository\usersRepository")
 */
class users {

    /**
     * @ORM\Column(name="id_users", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_users;
    /**
     * @ORM\Column(name="nom_users", type="text")
     */

    private $nom_users;
    /**
     * @ORM\Column(name="email_users", type="text")
     */
    private $email_users;
    /**
     * @ORM\Column(name="_prenom_users", type="text")
     */
    private $prenom_users;
    /**
     * @ORM\Column(name="password_users", type="text")
     */
    private $password_users;
    /**
     * @ORM\Column(name="avatar_users", type="text")
     */
    private $avatar_users;
    /**
     * @ORM\Column(name="role_users", type="text")
     */
    private $role_users;



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
    public function getNomUsers()
    {
        return $this->nom_users;
    }

    /**
     * @param mixed $nom_users
     */
    public function setNomUsers($nom_users)
    {
        $this->nom_users = $nom_users;
    }

    /**
     * @return mixed
     */
    public function getEmailUsers()
    {
        return $this->email_users;
    }

    /**
     * @param mixed $email_users
     */
    public function setEmailUsers($email_users)
    {
        $this->email_users = $email_users;
    }

    /**
     * @return mixed
     */
    public function getPasswordUsers()
    {
        return $this->password_users;
    }

    /**
     * @param mixed $password_users
     */
    public function setPasswordUsers($password_users)
    {
        $this->password_users = $password_users;
    }

    /**
     * @return mixed
     */
    public function getAvatarUsers()
    {
        return $this->avatar_users;
    }

    /**
     * @param mixed $avatar_users
     */
    public function setAvatarUsers($avatar_users)
    {
        $this->avatar_users = $avatar_users;
    }

    /**
     * @return mixed
     */
    public function getRoleUsers()
    {
        return $this->role_users;
    }

    /**
     * @param mixed $role_users
     */
    public function setRoleUsers($role_users)
    {
        $this->role_users = $role_users;
    }

    /**
     * @return mixed
     */
    public function getPrenomUsers()
    {
        return $this->prenom_users;
    }

    /**
     * @param mixed $prenom_users
     */
    public function setPrenomUsers($prenom_users)
    {
        $this->prenom_users = $prenom_users;
    }











}
