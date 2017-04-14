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

class LayoutController extends Controller
{
    public function indexAction(Request $request){
        $session = $request ->getSession();


        if($session->get('id_user') ===0) {


            return $this->redirectToRoute('bde_site_homepage');


        }


        else{
            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:activite');

            $activite = new activite();

            $activite = $repository->findAll();


            return $this->render('BDESiteBundle:Default:layout.html.twig', array('activites' => $activite));
        }


    }
}

