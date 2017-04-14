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
        return $this->render('BDESiteBundle:Default:index.html.twig');
    }




    public function loginAction(Request $request){




        if ($request->isMethod('POST'))
        {


            $password= $request->request->get('Password');
            $email= $request->request->get('email');

            //if valide dans la table
            //return $this->redirectToRoute('oc_platform_home');



        }

        return new Response($email.$password);

    }


    public function registerAction (Request $request){



        $em = $this->getDoctrine()->getManager();

        $error=null;
        if($request->isMethod('POST')){
            $password= $request->request->get('Password');
            $Cpassword= $request->request->get('CPassword');
            $email= $request->request->get('Email');
            $nom= $request->request->get('Nom');
            $prenom=$request->request->get('Prenom');
            $avatar=$request->request->get('avatar');

            if($password != "" && $email !="" && $nom !="" && $prenom != "" && $password === $Cpassword ){


                $users = new users();
                $users->setEmailUsers($email);
                $users->setNomUsers($nom);
                $users->setPasswordUsers($password);
                $users->setRoleUsers('etudiant');
                $users->setPrenomUsers($prenom);
                $users->setAvatarUsers('yolo');


                $em->persist($users);
                $em->flush();
                $error = "enregistrement effectué";
                return $this->render('BDESiteBundle:Default:register.html.twig', array('error'=>$error  ));
            }



            else if ($password != "" && $email !="" && $nom !="" && $prenom!="" && $password != $Cpassword ){
                $error="Erreur mot de passe non identique";
                return $this->render('BDESiteBundle:Default:register.html.twig', array('error'=>$error  ));

            }
            else{

                $error="Veuillez renseigner tout les champs";
                return $this->render('BDESiteBundle:Default:register.html.twig', array('error'=>$error  ));


            }
        }
        else{

            $error=":)";
            return $this->render('BDESiteBundle:Default:register.html.twig',array('error'=> $error  ));

        }
    }
}
