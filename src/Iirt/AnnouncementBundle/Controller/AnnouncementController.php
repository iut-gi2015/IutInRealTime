<?php

//src/Iirt/AnnouncementBundle/Controller/AnnouncementController.php

namespace Iirt\AnnouncementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Iirt\AnnouncementBundle\Entity\Announcement;
use Iirt\AnnouncementBundle\Entity\AnnouncementFile;
use Iirt\UserBundle\Entity\Student;
use Iirt\AnnouncementBundle\Form\AnnouncementType;
use Iirt\AnnouncementBundle\Form\AnnouncementFileType;



class AnnouncementController extends Controller
{
    public function indexAction()
    {
        // On fixe en dur une liste ici, bien entendu par la suite on la récupérera depuis la BDD !
        $liste = array(
        array('id' => 2, 'titre' => 'Mon dernier weekend !', 'contenu' => 'le contenu de l\'article courant!'),
        array('id' => 5, 'titre' => 'Sortie de Symfony2.1', 'contenu' => 'le contenu de l\'article courant!'),
        array('id' => 7, 'titre' => 'Sortie de Symfony2.1', 'contenu' => 'le contenu de l\'article courant!'),
        array('id' => 9, 'titre' => 'Petit test', 'contenu' => 'le contenu de l\'article courant!')
        );
        return $this->render('IirtAnnouncementBundle:Announcement:index.html.twig', array(
        'liste_articles' => $liste // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
        ));    
    }
    
    public function ajouterAction()
    {
        $announcement = new Announcement();
        $announcement->setDate(new \DateTime());
        
        $user = $this->chercherEntity(1, 'IirtUserBundle:Student');
        $announcement->setStudent($user);
                
        $validator = $this->get('validator');
        $form = $this->createForm(new AnnouncementType(),$announcement);
        
        $request = $this->get('request');
        if($request->getMethod() == 'POST')
        {            
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine() -> getEntityManager();
                $em->persist($announcement);
                $em->persist($announcement->getAnnouncementFile());
                $em->flush();
                
                return $this->redirect($this->generateUrl('iirt_announcement_add'));
            }
        }
        return $this->render('IirtAnnouncementBundle:Announcement:ajouter.html.twig',array(
            'form' =>   $form->createView(),
        ));
    }
    
    public function afficherAction($id)
    {
        $repository = $this->getDoctrine()->getManager()
                            ->getRepository('IirtAnnouncementBundle:Announcement');
        // On récupère l'entité correspondant à l'id $id
        $annonce = $repository->find($id);
        // $article est donc une instance de Sdz\BlogBundle\Entity\Article
        // Ou null si aucun article n'a été trouvé avec l'id $id
        if($annonce === null)
        {
            throw $this->createNotFoundException('Annonce[id='.$id.']inexistant.');
        }
        return $this->render('IirtAnnouncementBundle:Announcement:index.html.twig', array(
             'annonce' => $annonce
        ));
    }
    
    public function modifierAction($id)
    {
        $announcement = $this->chercherEntity($id, 'IirtAnnouncementBundle:Announcement');
        $form = $this->createForm(new AnnouncementType,$announcement);
        $request = $this->get('request');
        if($request->getMethod() == 'POST')
        {            
            $form->bind($request);
            if($form)
            {
                $em = $this->getDoctrine() -> getEntityManager();
                $em->persist($announcement);
                $em->flush();
                
                return $this->redirect($this->generateUrl('iirt_announcement_add'));
            }
        }    
        return $this->render('IirtAnnouncementBundle:Announcement:modifier.html.twig',array('form'=>$form->createView()));
    }
    
    public function supprimerAction($id)
    {
        $user = $this->chercherEntity($id, 'IirtAnnouncementBundle:Announcement');
        $this->checkUser($id, $user);
        if($this->get('request')->getMethod() == 'GET')
        {
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($user);
            $em->remove($user->getAnnouncementFile());
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', 'Annonce supprimée');    
            return $this->redirect($this->generateUrl('iirt_announcement_add'));
        }
        return $this->render('IirtAnnouncementBundle:Announcement:supprimer.html.twig',array('user'=>$user));
    }
    
    public function chercherEntity($id,$rep)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository($rep);
        $user = $repository->find($id);
        return $user;        
    }
    
    private function checkUser($id,$user)
    {
         if($user === null)
        {
            throw $this->createNotFoundException('Annonce avec id='.$id.' inexistante.');
        }
    }
}
