<?php

namespace BDE\SiteBundle\Controller;

use BDE\SiteBundle\Entity\users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AccueilController extends Controller
{
    public function indexAction()
    {




        return $this->render('BDESiteBundle:Default:index.html.twig', array('text' => ""));
    }

    public function loginAction(Request $request)
    {

        $session = $request->getSession();
        $session->set('user_id', 0);

        if ($request->isMethod('POST')) {

            $email = $request->request->get('Email');
            $password = $request->request->get('Password');

            if ($password != "" && $email != "") {
                $repository = $this
                    ->getDoctrine()
                    ->getManager()
                    ->getRepository('BDESiteBundle:users');

                $users = new users();

                $users = $repository->findOneBy(
                    array('email_users' => $email)
                );

                if ($users == null) {

                    $error = "Email invalide";
                    return $this->render('BDESiteBundle:Default:index.html.twig', array('text' => $error));
                } else {
                    if (password_verify($password, $users->getPasswordUsers())) {


                        $session->set('user_id', $users->getIdUsers());
                        $error = "connexion en tant que " . $users->getRoleUsers();
                        return $this->redirectToRoute('bde_site_layout');

                    } else {
                        $error = "Mot de passe incorrect";
                        return $this->render('BDESiteBundle:Default:index.html.twig', array('text' => $error));
                    }

                }

                return $this->render('BDESiteBundle:Default:index.html.twig', array('text' => $email));

            }

            return $this->render('BDESiteBundle:Default:index.html.twig', array('text' => "Bienvenue"));
        }
    }


    public function registerAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {
            $password = $request->request->get('Password');
            $Cpassword = $request->request->get('CPassword');
            $email = $request->request->get('Email');
            $nom = $request->request->get('Nom');
            $prenom = $request->request->get('Prenom');
            $avatar = $request->files->get('imgprofil');

            if ($password != null && $email != null && $nom != null && $prenom != null) {

                $repository = $this
                    ->getDoctrine()
                    ->getManager()
                    ->getRepository('BDESiteBundle:users');

                $users = new users();

                $users = $repository->findOneBy(
                    array('email_users' => $email)
                );

                if ($users != null) {
                    $error = "Email déjà utilisée";
                    return $this->render('BDESiteBundle:Default:register.html.twig', array('error' => $error));
                } else {

                    if ($password != $Cpassword) {
                        $error = "Mots de passe non identiques" . $users->getEmailUsers();
                        return $this->render('BDESiteBundle:Default:register.html.twig', array('error' => $error));
                    } else {

                        $users = new users();
                        $users->setEmailUsers($email);
                        $users->setNomUsers($nom);
                        $password = password_hash($password, PASSWORD_BCRYPT);
                        $users->setPasswordUsers($password);
                        $users->setRoleUsers('etudiant');
                        $users->setPrenomUsers($prenom);


                        if ($avatar != null) {
                            $path = 'ressources/image\\';
                            $nom = $nom . $prenom . '.png';
                            $resultatimage = $avatar->move($path, $nom);

                            $users->setAvatarUsers($path . $nom);
                        } else {
                            $users->setAvatarUsers('ressources/image/default.png');
                        }

                    }

                    $em->persist($users);
                    $em->flush();
                    $error = "Inscription de " . $users->getEmailUsers();
                    return $this->render('BDESiteBundle:Default:register.html.twig', array('error' => $error));
                }
            } else {

                $error = "Veuillez renseigner tout les champs";
                return $this->render('BDESiteBundle:Default:register.html.twig', array('error' => $error));

            }
        } //requete GET
        else {

            $error = "";
            return $this->render('BDESiteBundle:Default:register.html.twig', array('error' => $error));

        }
    }
    public function mentionAction()
    {
        return  $this->render('BDESiteBundle:Default:MentionsLegales.html.twig');
    }

}
