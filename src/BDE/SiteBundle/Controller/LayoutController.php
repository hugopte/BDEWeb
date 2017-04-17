<?php
/**
 * Created by PhpStorm.
 * User: Hugo PETTE
 * Date: 14/04/2017
 * Time: 14:57
 */

namespace BDE\SiteBundle\Controller;

use BDE\SiteBundle\Entity\activite;
use BDE\SiteBundle\Entity\users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class LayoutController extends Controller
{
    public function indexAction(Request $request)
    {

        $this->VerifUser($request);
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:users');

        $session = $request->getSession();
        $users_id = $session->get('user_id');

        $users = $repository->findOneBy(array('id_users' =>$users_id));


            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:activite');



            $activite = $repository->findAll();

            if ($users->getRoleUsers() =='etudiant') {

                return $this->render('BDESiteBundle:Default:layout.html.twig', array('activites' => $activite,'users'=>$users));
            }

            elseif ($users->getRoleUsers() =='BDE'){

                return $this->render('BDESiteBundle:Default:layout.html.twig', array('activites' => $activite,'users'=>$users));
            }

            else {

                return $this->render('BDESiteBundle:Default:layout.html.twig', array('activites' => $activite,'users'=>$users));


            }

    }


    public function addAction(Request $request)
    {

        $this->VerifUser($request);


        if ($request->isMethod('GET')) {

            return $this->render('BDESiteBundle:Default:SoumettreActivite.html.twig',array('text' =>''));
        }

        else{
            $NomActivite = $request->request->get('NomActivite');
            $Description = $request->request->get('Description');
            $Date = $request->request->get('Date');

            if ($NomActivite =="" ){

                $text = "Remplissage incorrect";
                return $this->render('BDESiteBundle:Default:SoumettreActivite.html.twig',array('text' =>$text));
            }

            else{
                var_dump($Date);
                $activite = new activite();

                $activite->setNomActivite($NomActivite);
                $activite->setDateActivite($Date);
                $activite->setDescriptionActivite($Description);
                $activite->setValidationActivite(true);
                $em = $this->getDoctrine()->getManager();
                $em->persist($activite);
                $em->flush();

                $text =" Inscription réussi";
                return $this->render('BDESiteBundle:Default:SoumettreActivite.html.twig',array('text' =>$text));


            }

        }


    }


    public function delAction(Request $request,$id){
        $this->VerifUser($request);
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:users');

        $session = $request->getSession();
        $users_id = $session->get('user_id');

        $users = $repository->findOneBy(array('id_users' =>$users_id));
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:activite');



        if($users->getRoleUsers() =='etudiant' ){

            return new Response("Erreur vous n'avez pas les droits ");

        }

        else {

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:activite');


            $activite = $repository->findOneBy(array('id_activite' =>$id));

            $em = $this->getDoctrine()->getManager();


                $em->remove($activite);
                $em->flush();



            return new Response("Activite supprimer");


        }
    }









    public function VerifUser(Request $request )
    {
        $session = $request->getSession();


        if ($session->get('id_user') === 0) {


            return $this->redirectToRoute('bde_site_homepage');


        }


    }

}