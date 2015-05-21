<?php

//src/Iirt/UserBundle/Controller/UserController.php

namespace Iirt\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Iirt\UserBundle\Entity\Student;
use Iirt\UserBundle\Entity\Teacher;
use Iirt\UserBundle\Entity\Role;
use Iirt\UserBundle\Form\StudentType;
use Iirt\UserBundle\Form\TeacherType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;



class UserController extends Controller
{
    public function ajouterAction()
    {
        $request = $this->get('request');
        $type = $request->request->get('type');
        
        if($type === 1)
        {    
            $student = new Student;
            $student->setAble(FALSE);
            $student->setConnected(FALSE);
            $student->setInscriptDate(new \DateTime());

            $role = $this->chercherUser(1, 'IirtUserBundle:Role');
            $student->addRole($role);

            $validator = $this->get('validator');
            $form = $this->createForm(new StudentType,$student);


            if($request->getMethod() == 'POST')
            {            
                $form->bind($request);
                if($form->isValid())
                {
                    $em = $this->getDoctrine() -> getEntityManager();
                    $em->persist($student);
                    $em->flush();

                    return $this->redirect($this->generateUrl('iirt_user_homepage'));
                }


            }
        }
        if($type === 2)
        {
            $teacher = new Teacher;
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

                    return $this->redirect($this->generateUrl('iirt_user_homepage'));
                }
            }
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
        $request = $this->get('request');
        $session = $request->getSession();
        $type = $session->request->get('type');
        
        if($type === 1)
        {
            $user = $this->chercherUser($id, 'IirtUserBundle:Student');
            $form = $this->createForm(new StudentType,$user);
            
            if($request->getMethod() == 'POST')
            {            
                $form->bind($request);
                if($form)
                {
                    $em = $this->getDoctrine() -> getEntityManager();
                    $em->persist($user);
                    $em->flush();
                    $session->getFlashBag()->add('info', 'Etudiant MAJ');
                    return $this->render('IirtUserBundle:User:modifier.html.twig',array('form'=>$form->createView()));
                }
            }
        }
        
        if($type === 2)
        {
            $user = $this->chercherUser($id, 'IirtUserBundle:Teacher');
            $form = $this->createForm(new TeacherType,$user);
            $request = $this->get('request');
            if($request->getMethod() == 'POST')
            {            
                $form->bind($request);
                if($form)
                {
                    $em = $this->getDoctrine() -> getEntityManager();
                    $em->persist($user);
                    $em->flush();
                    $session->getFlashBag()->add('info', 'Enseignant MAJ');
                    return $this->render('IirtUserBundle:User:modifier.html.twig',array('form'=>$form->createView()));
                }
            }
        }
        
        return $this->render('IirtUserBundle:User:modifier.html.twig',array('form'=>$form->createView()));
    }
    
    public function supprimerAction($id)
    {
        $request = $this->get('request');
        $session = $request->getSession();
        $type = $session->request->get('type');
        
        if($type === 1)
        {    
            $user = $this->chercherUser($id, 'IirtUserBundle:Student');
            $this->checkUser($id, $user);
            if($this->get('request')->getMethod() == 'GET')
            {
                $em = $this->getDoctrine()->getEntityManager();
                $em->remove($user);
                $em->flush();
                $session->getFlashBag()->add('info', 'Compte Etudiant supprimé');    
                return $this->redirect($this->generateUrl('iirt_user_add'));
            }
        }
        
        if($type === 2)
        {    
            $user = $this->chercherUser($id, 'IirtUserBundle:Teacher');
            $this->checkUser($id, $user);
            if($this->get('request')->getMethod() == 'GET')
            {
                $em = $this->getDoctrine()->getEntityManager();
                $em->remove($user);
                $em->flush();
                $session->getFlashBag()->add('info', 'Compte Enseignant supprimé');    
                return $this->redirect($this->generateUrl('iirt_user_add'));
            }
        }
        return $this->render('IirtUserBundle:User:supprimer.html.twig',array('user'=>$user));
    }
    public function loginAction()
    {
        $request = $this->get('request');
        $session = $request->getSession();
        $user_id = $session->request->get('username');
        $user_pass = $session->request->get('password');
        $type = $session->request->get('type');
        
        if($request->getMethod() == 'POST')
        {
            if($type === 1)
            {
                $user = $this->chercherUser($id, 'IirtUserBundle:Student');
                if( $user !== null )
                {
                    $user->setConnected(true);
                    $this->render('IirtUserBundle:User:index.html.twig',array('user'=> $user));
                }
                else
                {
                    throw $this->createNotFoundException('Etudiant avec matricule '.$id.' inexistant.');
                }
            }
            if($type === 2)
            {
                $user = $this->chercherUser($id, 'IirtUserBundle:Teacher');
                if( $user !== null )
                {
                    $user->setConnected(true);
                    $this->render('IirtUserBundle:User:index.html.twig',array('user'=> $user));
                }
                else
                {
                    throw $this->createNotFoundException('Enseignant avec identifiant telephonique '.$id.' inexistant.');
                }
            }
        }
        else
        {
            return $this->redirect($this->generateUrl('iirt_user_homepage'));
        }
        
        
    }
    
    public function logoutAction()
    {
        $request = $this->get('request');
        $session = $request->getSession();
        $session->clear();
        $user->setConnected(false);
        $this->render('IirtUserBundle:User:index.html.twig',array('message'=> 'Vous etes déconnecté(e)'));
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
