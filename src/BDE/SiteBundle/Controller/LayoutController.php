<?php
/**
 * Created by PhpStorm.
 * User: Hugo PETTE
 * Date: 14/04/2017
 * Time: 14:57
 */

namespace BDE\SiteBundle\Controller;

use BDE\SiteBundle\Entity\activite;
use BDE\SiteBundle\Entity\boutique;
use BDE\SiteBundle\Entity\commentaire;
use BDE\SiteBundle\Entity\vote;

use BDE\SiteBundle\Entity\inscription;
use BDE\SiteBundle\Entity\photo;
use BDE\SiteBundle\Entity\users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class LayoutController extends Controller
{
    public function indexAction(Request $request) //controlleur page principale
    {


        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:users');    //on recupere  le dossierdes userss

        $session = $request->getSession();
        $users_id = $session->get('user_id');       //on recupere l'id de l'utilisateur dans la variable de session

        $users = $repository->findOneBy(array('id_users' =>$users_id));   //on recupere le user dans la bdd


            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:activite');



            $activite = $repository->findBy(array('validation_activite'=>true));    //on recupere un tableau des activites valider



                return $this->render('BDESiteBundle:Default:layout.html.twig', array('activites' => $activite,'users'=>$users));


    }


    public function addAction(Request $request)   //controlleur ajouté activité
    {




        if ($request->isMethod('GET')) {     //si la methode est get on retourne juste la page

            return $this->render('BDESiteBundle:Default:SoumettreActivite.html.twig',array('text' =>''));
        }

        else{                                       //methode post
            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:users');

            $session = $request->getSession();
            $users_id = $session->get('user_id');
            $users = $repository->findOneBy(array('id_users' =>$users_id));


            $NomActivite = $request->request->get('NomActivite');    //on recupere les variables rentré dans le formulaire
            $Description = $request->request->get('Description');
            $Date = $request->request->get('Date');
            $image= $request->files->get('img');

            if ($NomActivite =="" ){                                   //on verifie que l'utilisateut a mis un nom sinon on lui retourne la page avec un msg d'erreur

                $text = "Remplissage incorrect";
                return $this->render('BDESiteBundle:Default:SoumettreActivite.html.twig',array('text' =>$text));
            }

            else{         //on créé une activité si le remplissage est correcte


                $activite = new activite();

                $activite->setNomActivite($NomActivite);
                $activite->setDateActivite($Date);
                $activite->setDescriptionActivite($Description);
                $activite->setNbrVote('0');
                if($users->getRoleUsers() == 'BDE') {          //on definit l'activité validé ou non n fonction du role de l'utilisateur
                    $activite->setValidationActivite(true);
                }
                elseif ($users->getRoleUsers() == 'admin') {
                    $activite->setValidationActivite(true);
                }
                else{
                    $activite->setValidationActivite(false);
                }

                if($image!= null ){                        //Si l'utilisateur a rentré une image on l'enregistre dans le serveur et le chemin dans la bdd
                    $path = 'ressources/image/';
                    $nom = $NomActivite.$Date."img".'.png';
                    $resultatimage = $image->move($path,$nom);

                    $activite->setImage($path.$nom);

                }else{                                    //sinon on enregistre une image par default
                    $activite->setImage("ressources/image/defaults.png");
                }
                $em = $this->getDoctrine()->getManager();
                $em->persist($activite);
                $em->flush();

                $text ="Inscription réussie";            //on affiche un msg pour l'inscription réussi
                return $this->render('BDESiteBundle:Default:SoumettreActivite.html.twig',array('text' =>$text));


            }

        }


    }


    public function delAction(Request $request,$id){

        $em = $this->getDoctrine()->getManager();

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:users');   //recuperation user

        $session = $request->getSession();
        $users_id = $session->get('user_id');

        $users = $repository->findOneBy(array('id_users' =>$users_id));
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:activite');



        if($users->getRoleUsers() =='etudiant' ){         //verification des droits
            return new Response("Erreur vous n'avez pas les droits ");

        }

        else {



            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:commentaire'); //on recupere les commentaires lié a l'activité
            $commentaires = $repository->findBy(array('id_activite' =>$id));
            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:inscription');
            $inscriptions = $repository->findBy(array('id_activite' =>$id));  // """""" les inscriptions
            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:photo');
            $photos = $repository->findBy(array('id_activite' =>$id));         //les photos


            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:vote');
            $votes = $repository->findBy(array('id_activite' =>$id));     //les votes

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:activite');      //et on recupere l'activité avec l'id que l'on donne dans l'url


            $activite = $repository->findOneBy(array('id_activite' =>$id));


            foreach ($commentaires as $commentaire){$em->remove($commentaire);}  //on supprime tout les élèments recupérés

            foreach ($inscriptions as $inscription){$em->remove($inscription);}
            foreach ($photos as $photo){$em->remove($photo);}
            foreach ($votes as $vote){$em->remove($vote);}



                $em->remove($activite);
                $em->flush();



            return new Response("Activité supprimée");


        }
    }

    public function activiteAction(Request $request, $id ){
        $em = $this->getDoctrine()->getManager();
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

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:inscription');



        if($request->isMethod('POST')){


            $inscription = $request->request->get('inscription');
            $comment = $request->request->get('Comment');
            $img = $request->files->get('img');



            if($inscription == 'on' ){

                $inscription = $repository->findOneBy(array('id_activite' =>$id_activite,'id_users'=>$id_users));


                if($inscription == null) {

                    $inscription = new inscription();

                    $inscription->setIdActivite($activite);


                    $inscription->setIdUsers($users);

                    $em->persist($inscription);

                    $em->flush();

                }
            }
            if($comment !="" ||$comment !=null){

                $commentaire = new commentaire();
                $commentaire->setIdActivite($activite);
                $commentaire->setIdUsers($users);
                $commentaire->setTextComment($comment);


                $em ->persist($commentaire);
                $em->flush();

            }

            if($img != null){


                $path = 'ressources/image/';


                $nom = uniqid().'.png';


                $img->move($path,$nom);




                $photo = new photo();
                $photo->setIdUsers($users);
                $photo->setIdActivite($activite);
                $photo->setUrlPhoto($path.$nom);
                $photo->setAltPhoto("photo");



                $em->persist($photo);
                $em->flush();

            }



        }


        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:inscription');

        $inscrit = $repository->findBy(array('id_activite'=>$activite->getIdActivite()));



        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:commentaire');


        $commentaires = $repository->findBy(array('id_activite'=>$activite->getIdActivite()));


        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:photo');


        $photos = $repository->findBy(array('id_activite'=>$activite->getIdActivite()));





        return $this->render('BDESiteBundle:Default:activite.html.twig',array('activite' =>$activite,'inscrits'=>$inscrit,'comment'=>$commentaires,'photos'=>$photos));


    }










    public function VerifUser(Request $request )
    {
        $session = $request->getSession();


        if ($session->get('id_user') === 0) {


            return $this->render('BDESiteBundle:Default:index.html.twig', array('text' => "Vous n'avez pas les droits"));


        }


        elseif($session->get('id_user')== null){
            return $this->render('BDESiteBundle:Default:index.html.twig', array('text' => "Vous n'avez pass les droits"));
        }


        else{return null;}


    }



    public function activiteproposerAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:users');

        $session = $request->getSession();
        $users_id = $session->get('user_id');
        $vote = $request->get('vote');
        $users = $repository->findOneBy(array('id_users' =>$users_id));


        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:activite');



        $activite = $repository->findBy(array('validation_activite'=>false));

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:vote');
            $i=0;
        foreach ($activite as $act) {
            $i=0;
            $votes = $repository->findBy(array('id_activite' => $act));
            foreach ($votes as $vt) {
                $i++;
            }


            $act->setNbrVote($i);


        }

        if($vote != null){
            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:activite');
            $activite = $repository->findOneBy(array("id_activite"=> $vote));

            $vt = new vote();
            $vt->setIdUsers($users);
            $vt->setIdActivite($activite);
            $em->persist($vt);

            $em->flush();



        }
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:activite');

        $activite = $repository->findBy(array('validation_activite'=>false));



        return $this->render('BDESiteBundle:Default:layout.html.twig', array('activites' => $activite,'users'=>$users));

    }


    public function boutiqueAction(Request $request){

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BDESiteBundle:boutique');

        $article=$repository->findAll();

        return $this->render('BDESiteBundle:Default:boutique.html.twig', array('boutique' => $article));

    }
   public function addarticleAction(Request $request)

    {
        if ($request->isMethod('Get')) {
            Return $this->render('BDESiteBundle:Default:ajouterarticle.html.twig',array('text'=>''));
        }
        else {

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BDESiteBundle:users');
//Prise de l'utilisateur
            $session = $request->getSession();
            $users_id = $session->get('user_id');
            $users = $repository->findOneBy(array('id_users' => $users_id));


            $NomArticle = $request->request->get('NomActivite');


            $Prix = $request->request->get('price');
            $image = $request->files->get('image');
            if ($users->getRoleUsers() == 'Admin') {
                if ($NomArticle == "") {

                    $text = "Remplissage incorrect";
                    return $this->render('BDESiteBundle:Default:ajouterarticle.html.twig', array('text' => $text));



                } else {

                    $article = new boutique();

                    $article->setNomArticle($NomArticle);
                    $article->setPrixArticle($Prix);



                    if ($image != null) {
                        $path = 'ressources/image/';
                        $nom = $NomArticle . $Prix . "img" . '.png';
                        $resultatimage = $image->move($path, $nom);

                        $article->setImage($path . $nom);

                    } else {
                        $article->setImage("ressources/images/defaults.png");
                    }

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($article);
                    $em->flush();


                    return $this->redirectToRoute("bde_site_gestion_boutique");


                }
            }
            else {return new Response('Vous /n avez pas les droits' );}
        }
    }
}





