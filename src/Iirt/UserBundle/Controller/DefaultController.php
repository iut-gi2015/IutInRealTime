<?php

namespace Iirt\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IirtUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
