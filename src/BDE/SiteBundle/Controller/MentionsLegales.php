<?php
/**
 * Created by PhpStorm.
 * User: mjulien
 * Date: 20/04/17
 * Time: 10:33
 */
namespace BDE\SiteBundle\Controller;

use Symfony\Component\HttpKernel\Tests\Controller;

class MentionsLegales extends Controller
{
    public function MentionsLegalesActions()
    {
        return  $this->render('MentionsLegales.html.twig');
    }
}