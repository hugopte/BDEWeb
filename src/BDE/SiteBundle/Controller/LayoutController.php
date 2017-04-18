<?php
/**
 * Created by PhpStorm.
 * User: Hugo PETTE
 * Date: 14/04/2017
 * Time: 14:57
 */

namespace BDE\SiteBundle\Controller;

use BDE\SiteBundle\Entity\activite;
use BDE\SiteBundle\Entity\inscription;
use BDE\SiteBundle\Entity\users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


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

                $activite = new activite();

                $activite->setNomActivite($NomActivite);
                $activite->setDateActivite($Date);
                $activite->setDescriptionActivite($Description);
                $activite->setValidationActivite(true);
                $em = $this->getDoctrine()->getManager();
                $em->persist($activite);
                $em->flush();

                $text ="Inscription réussi";
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

    public function activiteAction(Request $request, $id ){


        if($request->isMethod('POST')){

            $inscription = $request->request->get('inscription');



        }
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


        $activite =$repository->findOneBy(array('id_activite' =>$id));

        $id_activite = $activite->getIdActivite();

        $id_users = $users->getIdUsers();
        $em = $this->getDoctrine()->getManager();
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:inscription');

        if($request->isMethod('POST')){


            $inscription = $request->request->get('inscription');


            if($inscription == 'on' ){

                $inscription = new inscription();

                $inscription->setIdActivite($activite);


                $inscription->setIdUsers($users);

                $em->persist($inscription);

                $em->flush();

            }



        }





        //$query = $em->createQuery('SELECT u ,i  FROM BDESiteBundle:inscription i JOIN u.id_inscription i WHERE i.id_activite = :id');
        //$query->setParameter('id', $activite->getIdActivite());
        //$results = $query->getResult();
        //var_dump($results);

        return $this->render('BDESiteBundle:Default:activite.html.twig',array('activite' =>$activite));


    }









    public function VerifUser(Request $request )
    {
        $session = $request->getSession();


        if ($session->get('id_user') == 0) {


            return $this->redirectToRoute('bde_site_homepage');


        }


        if ($session->get('id_user')== null){
            return $this->redirectToRoute('bde_site_homepage');
        }


    }




}