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

define("ROLE", "IirtUserBundle:Role");

class UserController extends Controller
{
    
    public function indexAction()
    {
        $session = $this->get('session');
        
        if($session->get('matricule')){
            $repository = $this->getDoctrine()->getManager()->getRepository('IirtUserBundle:Teacher');
        }else{
            $repository = $this->getDoctrine()->getManager()->getRepository('IirtUserBundle:Student');
        }
        $user = $repository->findAll();
        return $this->render('IirtUserBundle:User:index.html.twig',array('user' => $user));    
    }
    
    public function ajouterEtudAction()
    {
        $request = $this->get('request');
        //$type = $request->request->get('type');  
        $student = new Student;
        $student->setAble(FALSE);
        $student->setConnected(FALSE);
        $student->setInscriptDate(new \DateTime());

        $role = $this->chercherEntity(1, 'IirtUserBundle:Role');
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

                return $this->redirect($this->generateUrl('iirt_announcement'));
            }
        }

        return $this->render('IirtUserBundle:User:ajouter.html.twig',array(
            'form' =>   $form->createView(),
        ));
    }    
    
    public function ajouterEnsAction()
        {
            $request = $this->get('request');
            $teacher = new Teacher;
            $teacher->setConnected(FALSE);
            $teacher->setInscriptDate(new \DateTime());
            $validator = $this->get('validator');
            $form = $this->createForm(new TeacherType,$teacher);

            
            if($request->getMethod() == 'POST')
            {            
                $form->bind($request);
                if($form->isValid())
                {
                    $em = $this->getDoctrine() -> getEntityManager();
                    $em->persist($teacher);
                    $em->flush();

                    return $this->redirect($this->generateUrl('iirt_announcement'));
                }
            }
            return $this->render('IirtUserBundle:User:ajouter.html.twig',array(
            'form' =>   $form->createView()
            ));
        }
        
        
    
    // les fonctions afficher etudiant et enseignant du bundle user sont utilisées pour
        // gérer les utilisateurs
    public function listeEtudAction($role)
    {
        //$user = $this->chercherUser($id,'IirtUserBundle:Student');
       
        $repository = $this->getDoctrine()->getManager()->getRepository('IirtUserBundle:Student');
        $users = $repository->findAll();
        return $this->render('IirtUserBundle:User:afficher.html.twig',array('users'=> $users, 'role' => $role));    
    }
    
    public function modifierRoleAction($id)
    {
        $request = $this->get('request');
        
        $user = $this->chercherUserUnique($id, 'IirtUserBundle:Student');
        
        $repository = $this->getDoctrine()->getManager()->getRepository('IirtUserBundle:Role');
        $roles = $repository->findAll();
        // recupération du formulaire
        $user_role = $request->request->get('role');
        $role = $this->chercherRole($user_role);
        
        if($request->getMethod() == 'POST')
        {
            $user->addRole($role);
            $em = $this->getDoctrine() -> getEntityManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('iirt_user_list_student',array("role" => 5)));  
        }
        return $this->render('IirtUserBundle:User:role.html.twig', array('users'=>$user, 'roles'=>$roles));
    }
    
    public function ajoutEditeurAction($id)
    {
        $user = $this->chercherUserUnique($id, 'IirtUserBundle:Student');
        $role = $this->chercherRole(3);
        
        $user->addRole($role);
        $em = $this->getDoctrine() -> getEntityManager();
        $em->persist($user);
        $em->flush();

        return $this->redirect($this->generateUrl('iirt_user_list_student',array("role" => 2)));  
    }
    
    public function afficherEtudAction($id)
    {
        $user = $this->chercherUser($id,'IirtUserBundle:Student');
       
        $this->checkUser($id, $user);
                
        return $this->render('IirtUserBundle:User:afficher.html.twig',array('user'=> $user));    
    }
    
    public function afficherEnsAction($id)
    {
        $user = $this->chercherUser($id,'IirtUserBundle:Teacher');
       
        $this->checkUser($id, $user);
                
        return $this->render('IirtUserBundle:User:afficher.html.twig',array('user'=> $user));    
    }
    
    public function modifierEtudAction($id)
    {
        $request = $this->get('request');
        $session = $request->getSession();
        //$type = $session->request->get('type');
        
        
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
        
        return $this->render('IirtUserBundle:User:modifier.html.twig',array('form'=>$form->createView()));
    }
    
    public function modifierEnsAction($id)    
    {    
        
        $request = $this->get('request');
        $session = $request->getSession();
        //$type = $session->request->get('type');

        $user = $this->chercherUser($id, 'IirtUserBundle:Teacher');
        $form = $this->createForm(new TeacherType,$user);
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
        $user_id = $request->request->get('pseudo');
        $user_pass = $request->request->get('password');
        $type = $request->request->get('type');
        
        $temoin ="rien ne passe";
        if($request->getMethod() == 'POST')
        {
            // on va creer une fonctionne booleene qui prendra en parametre le matricule et l'id du role et retournera
            // si l'utilisateur a le role sinon faux.
            if($type == 1)
            {
                $user = $this->chercherUserUnique($user_id, 'IirtUserBundle:Student');
                if( $user == null )
                {   
                    $temoin ="ça ne passe pas";
                    throw $this->createNotFoundException('Etudiant avec matricule '.$user_id.' inexistant.');
                }
                $session = $this->get('session');
                $session->set('id',$user->getId());
                $session->set('path',$user->getPath());
                $session->set('name',$user->getFirstname());
                $session->set('matricule',$user->getMatricule());
                //$session->set('user',$element);
                foreach($user->getRoles() as $elemrol)
                {
                    // Récupération du service
                    $session->set('role',$elemrol->getName());
                }
                $user->setConnected(true);
                
                
                //return $this->render('IirtAnnouncementBundle:Announce:index.html.twig',array('user'=> $user));
                
            }
            if($type == 2)
            {
                $user = $this->chercherTeacher($user_id, 'IirtUserBundle:Teacher');
                if( $user == null )
                {     
                    throw $this->createNotFoundException('Enseignant avec identifiant telephonique '.$user_id.' inexistant.');
                }
                foreach($user as $element)
                {
                    // Récupération du service
                    $session = $this->get('session');
                    $session->set('id',$element->getId());
                    $session->set('name',$element->getFirstname());
                    $session->set('department',$element->getDepartment());
                    $element->setConnected(true);
                }
                //return $this->render('IirtAnnouncementBundle:Announce:index.html.twig',array('user'=> $user));
                //return $this->redirect($this->generateUrl('iirt_announcement'));
            }
        }
        //return $this->render('IirtUserBundle:User:index.html.twig',array('user' => $user, 'temoin'=> $temoin));
        return $this->redirect($this->generateUrl('iirt_announcement'));        
           // return $this->redirect($this->generateUrl('iirt_announcement'));
   
    }
    
    public function menuConnectAction($menu)
    {
        
        $session = $this->get('session');
        $user_id = $session->get('matricule');
        $user = $this->chercherUserUnique($user_id, 'IirtUserBundle:Student');
       // if ($menu == 1)
            return $this->render('IirtUserBundle:user:connexion.html.twig',array('user'=> $user, 'menu' => $menu ));
       /* elseif ($menu == 2) 
            return $this->render('IirtUserBundle:user:connexion.html.twig',array('user'=> $user));*/
       
    }
    
    public function logoutAction()
    {
        $request = $this->get('request');
        $session = $request->getSession();
        $session->clear();
        //$user->setConnected(false);
        //$this->render('IirtUserBundle:User:index.html.twig',array('message'=> 'Vous etes déconnecté(e)'));
        return $this->redirect($this->generateUrl('iirt_announcement'));
        
    }
    
    public function chercherEntity($id,$rep)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository($rep);
        $user = $repository->find($id);
        return $user;        
    }
    
    public function listOfUseWithRole($user_role)
    {
        $rolesArray = chercherRole($user_role);
        foreach($rolesArray as $element) {
            $roleInstance = $element;
        }
        return $roleInstance;        
    }
    
    public function chercherRole($user_role)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('IirtUserBundle:Role');
        $rolesArray = $repository->findBy(array("id" => $user_role));
        return $rolesArray;        
    }
    
    public function chercherRoleUtilisateur($user_role)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('IirtUserBundle:Role');
        $rolesArray = $repository->findBy(array("id" => $user_role));
        foreach($rolesArray as $element) {
            $roleInstance = $element;
        }
        return $roleInstance;        
    }
    
    public function chercherUserUnique($id,$rep)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository($rep);
        $userArray = $repository->findBy(array('matricule' => $id));
        foreach($userArray as $element)
        {
            // Récupération du service
            $userInstance = $element;
        }
        
        return $userInstance;        
    }
    public function chercherUser($id,$rep)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository($rep);
        $user = $repository->findBy(array('matricule' => $id));
        
        return $user;        
    }
    
    public function chercherTeacher($id,$rep)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository($rep);
        $user = $repository->findBy(array('firstname' => $id));
        return $user;        
    }
    
    private function checkUser($id,$user)
    {
        if($user === null)
        {
            throw $this->createNotFoundException('Utilisateur avec id='.$id.' inexistant.');
        }
    }
    public function checkUserRole($id,$user)
    {
        $user = repository(ROLE)->findBy(array('' => $id));
        return $user; 
    }
    private function repository($rep)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository($rep);
        return $repository; 
    }
    
}
