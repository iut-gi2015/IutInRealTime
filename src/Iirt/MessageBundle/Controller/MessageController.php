<?php

namespace Iirt\MessageBundle\Controller;

use Iirt\MessageBundle\Entity\Message;
use Iirt\MessageBundle\Entity\MessageFile;
use Iirt\MessageBundle\Form\MessageType;
use Iirt\MessageBundle\Form\MessageFileType;
use Iirt\UserBundle\Entity\Student;
use Iirt\UserBundle\Entity\Teacher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MessageController extends Controller
{
    public function indexAction()
    {
        return $this->render('IirtMessageBundle:message:index.html.twig');
    }
    
    public function ajouterAction(){
            // Création de l'entité

        $message = new Message();
        //$student = new Student();
        //$teacher = new Teacher();
        
        $form = $this->createForm(new MessageType, $message);
        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $form->bind($request);
            if( $form->isValid() )
            {
                $message->setReadOrNo(1);
                //$student->setStudent("eleve");
                //$teacher->setTeacher("professeur");
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($message);
                $em->flush();
                return $this->redirect( $this->generateUrl('IirtMessage_homepage'));
            }
        }
        return $this->render('IirtMessageBundle:message:ajouter.html.twig',
        array('form' => $form->createView()));
    }
}
