<?php

//src/Iirt/UserBundle/Controller/UserController.php

namespace Iirt\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Iirt\UserBundle\Entity\Student;
use Iirt\UserBundle\Entity\Teacher;
use Iirt\UserBundle\Entity\Role;
use Iirt\UserBundle\Form\StudentType;
use Iirt\UserBundle\Form\TeacherType;


class UserController extends Controller
{
    public function ajouterAction()
    {
        $student = new Student;
        $student->setAble(FALSE);
        $student->setConnected(FALSE);
        $student->setInscriptDate(new \DateTime());
        
        $role = $this->chercherUser(1, 'IirtUserBundle:Role');
        $student->addRole($role);
        
        $validator = $this->get('validator');
        $form = $this->createForm(new StudentType,$student);
        
        $request = $this->get('request');
        if($request->getMethod() == 'POST')
        {            
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine() -> getEntityManager();
                $em->persist($student);
                $em->flush();
                
                return $this->redirect($this->generateUrl('iirt_user_add'));
            }
       /* $teacher = new Teacher;
        $teacher->setConnected(FALSE);
        $teacher->setInscriptDate(new \DateTime());
        $validator = $this->get('validator');
        $form = $this->createForm(new TeacherType,$teacher);
        
        $request = $this->get('request');
        if($request->getMethod() == 'POST')
        {            
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine() -> getEntityManager();
                $em->persist($teacher);
                $em->flush();
                
                return $this->redirect($this->generateUrl('iirt_user_add'));
            }
        }*/
            
        }
        return $this->render('IirtUserBundle:User:ajouter.html.twig',array(
            'form' =>   $form->createView(),
        ));
    }
    
    public function afficherAction($id)
    {
        $user = $this->chercherUser($id,'IirtUserBundle:Student');
       
        $this->checkUser($id, $user);
                
        return $this->render('IirtUserBundle:User:afficher.html.twig',array('user'=> $user));    
    }
    
    public function modifierAction($id)
    {
        $user = $this->chercherUser($id, 'IirtUserBundle:Student');
        $form = $this->createForm(new StudentType,$user);
        $request = $this->get('request');
        if($request->getMethod() == 'POST')
        {            
            $form->bind($request);
            if($form)
            {
                $em = $this->getDoctrine() -> getEntityManager();
                $em->persist($user);
                $em->flush();
                
                return $this->render('IirtUserBundle:User:modifier.html.twig',array('form'=>$form->createView()));
            }
        }    
        return $this->render('IirtUserBundle:User:modifier.html.twig',array('form'=>$form->createView()));
    }
    
    public function supprimerAction($id)
    {
        $user = $this->chercherUser($id, 'IirtUserBundle:Student');
        $this->checkUser($id, $user);
        if($this->get('request')->getMethod() == 'GET')
        {
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($user);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', 'Utilisateur supprimé');    
            return $this->redirect($this->generateUrl('iirt_user_add'));
        }
        return $this->render('IirtUserBundle:User:supprimer.html.twig',array('user'=>$user));
    }
    
    public function chercherUser($id,$rep)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository($rep);
        $user = $repository->find($id);
        return $user;        
    }
    
    private function checkUser($id,$user)
    {
         if($user === null)
        {
            throw $this->createNotFoundException('Utilisateur avec id='.$id.' inexistant.');
        }
    }
    
}
