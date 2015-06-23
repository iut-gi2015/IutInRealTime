<?php

namespace Iirt\MessageBundle\Controller;

use Iirt\MessageBundle\Entity\Message;
use Iirt\MessageBundle\Entity\MessageFile;
use Iirt\MessageBundle\Form\MessageType;
use Iirt\MessageBundle\Form\MessageFileType;
use Iirt\MessageBundle\Entity\Answer;
use Iirt\UserBundle\Entity\Student;
use Iirt\UserBundle\Entity\Teacher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MessageController extends Controller
{
    public function indexAction()
    {
        $session = $this->get('session');
        $student_list = $this->chercherUser($session->get('id'), 'IirtUserBundle:Student');
        //$teacher = $this->chercherUser($id_teacher, 'IirtUserBundle:Teacher');
        // Récupération de l'étudiant
        foreach($student_list as $element)
            $student = $element;
        
        // indication
        /*
            on  selection l'enseignant qui enseigne dans la filiere de l'etudiant et a qui l'étudiant a déjà
            envoyé un message puis on prend le dernier message envoyé par l'un ou par l'autre et on l'affiche
            c'est le meme système que pour les boîte mail.
         */
        $repository = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('IirtMessageBundle:Message');
        $liste_message = $repository->findBy(array('student' => $student, 'read_or_no' => 0),
                                            array('date' => 'desc')
                                            );
        return $this->render('IirtMessageBundle:message:index.html.twig', array('liste' => $liste_message));
    }
    
    public function newAction()
    {
        
        $repository = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('IirtUserBundle:Teacher');
        $liste_enseignent = $repository->findAll();
        
        return $this->render('IirtMessageBundle:message:newMessage.html.twig', array('liste' => $liste_enseignent));
    }
    
    public function ajouterAction($destinataire){
            // Création de l'entité
        $teacher = new Teacher();
        $student = new Student();
        $message = new Message();
        $session = $this->get('session');
        // on vérifie s'il s'agit d'un étudiant ou d'un enseignent
        if($session->get('matricule')){
            $id_student = $session->get('id');
            $id_teacher = $destinataire;
        }else{
            $id_student = $destinataire;
            $id_teacher = $session->get('id');
        }
        
        $form = $this->createForm(new MessageType, $message);
        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $form->bind($request);
            if( $form->isValid() )
            {
                
                $student = $this->chercherUser($id_student, 'IirtUserBundle:Student');
                $teacher = $this->chercherUser($id_teacher, 'IirtUserBundle:Teacher');
                // Récupération de l'étudiant
                foreach($student as $element)
                    $message->setStudent($element);
                
                // Récupération de l'enseignent
                foreach($teacher as $element)
                    $message->setTeacher($element);
                
                $message->setReadOrNo(false);
                
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($message);
                $em->flush();
                return $this->redirect( $this->generateUrl('iirt_message_homepage'));
            }
        }
        return $this->render('IirtMessageBundle:message:ajouter.html.twig',
        array('form' => $form->createView()));
    }
    
    public function answerAction($messageId){
        $answer = new Answer();
        //$message = new Message();
        $session = $this->get('session');
        $request = $this->get('request');
        $reponse = $request->request->get('reponse');
        $message = $this->chercherUser($messageId, 'IirtMessageBundle:Message');
        //$liste_reponse = $this->chercherUser($messageId, 'IirtMessageBundle:Answer');
        $repository = $this->getDoctrine()->getManager()->getRepository('IirtMessageBundle:Answer');
        $liste_reponse = $repository->findBy(array('message' => $messageId));
        
        foreach ( $message as $element){
           $liste = $element;
        }
        if($request->getMethod() == 'POST')
        {
            $answer->setMessage($liste);
            $answer->setReponse($reponse);
            $answer->setAuthor($session->get('name'));
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($answer);
            $em->flush();
            return $this->redirect( $this->generateUrl('iirt_message_answer',array('messageId' => $messageId)));
        }
        
        return $this->render('IirtMessageBundle:message:answer.html.twig',
        array('message' => $liste, 'liste_reponse' => $liste_reponse));
    }
    
    // les fonction afficher student et teacher serve ici à envoyer les messages à l'un comme à l'autre
    public function afficherEtudAction($id)
    {
        $user = $this->chercherUser($id,'IirtUserBundle:Student');
        return $this->render('IirtUserBundle:User:afficher.html.twig',array('user'=> $user));    
    }
    
    public function afficherEnsAction()
    {
        $session = $this->get('session');
        //$filiere = $session->get('path');
        $user = $this->chercherUserMessage($session->get('path'),'IirtUserBundle:Teacher');
        return $this->render('IirtMessageBundle:Message:newMessage.html.twig',array('user'=> $user));    
    }
    
    public function chercherUserMessage($filiere,$rep)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('IirtUserBundle:Path');
        $filiereInst = $repository->findBy(array('id' => $filiere));
        $repository = $this->getDoctrine()->getManager()->getRepository($rep);
        //$query = $em->createQuery('SELECT t FROM IirtUserBundle:Teacher t WHERE t.department = :name');
        //$query->setParameter('departement', $filiere);
        //$users = $query->getResult(); // array of ForumUser objects
        $user = $repository->findBy(array('department' => $filiereInst));
        return $user;        
    }
    
    public function chercherUser($id,$rep)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository($rep);
        $user = $repository->findBy(array('id' => $id));
        return $user;        
    }
    
}
