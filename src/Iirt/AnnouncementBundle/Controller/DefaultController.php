<?php

namespace Iirt\AnnouncementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IirtAnnouncementBundle:Default:index.html.twig', array('name' => $name));
    }
}
