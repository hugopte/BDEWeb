<?php

namespace BDE\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BDESiteBundle:Default:index.html.twig');
    }
}
