<?php
/**
 * Created by PhpStorm.
 * User: Hugo PETTE
 * Date: 18/04/2017
 * Time: 17:02
 */


namespace BDE\SiteBundle\Controller;

use BDE\SiteBundle\Entity\users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class gestionController extends Controller
{
   public function usersAction(Request $request){

       $repository = $this
           ->getDoctrine()
           ->getManager()
           ->getRepository('BDESiteBundle:users');

       $session = $request->getSession();
       $users_id = $session->get('user_id');

       $users = $repository->findOneBy(array('id_users' =>$users_id));

       if($users->getRoleUsers() =='etudiant' ){

           return new Response("Erreur vous n'avez pas les droits ");

       }

       $users = $repository->findAll();


       return $this->render('BDESiteBundle:Default:gestion.html.twig',array('users' =>$users));


   }


}
