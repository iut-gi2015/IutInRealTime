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
        $user = $this->chercherEntity($id,'IirtAnnouncementBundle:Announcement');
       
        $this->checkUser($id, $user);
                
        return $this->render('IirtAnnouncementBundle:Announcement:afficher.html.twig',array('user'=> $user));    
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
                
                return $this->render('IirtAnnouncementBundle:Announcement:modifier.html.twig',array('form'=>$form->createView()));
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
