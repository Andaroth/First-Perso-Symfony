<?php

namespace OC\homePageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OChomePageBundle:Default:index.html.twig');
    }
}
