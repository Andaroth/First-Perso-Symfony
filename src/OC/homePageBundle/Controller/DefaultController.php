<?php

namespace OC\homePageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
      return $this->render('OChomePageBundle:Default:index.html.twig');
    } // indexAction() end
  
  public function otherAction($page) {
    switch($page){
      case 'about': $res = "about"; break;
      default: $res = "404"; break;
    } // switch end
    return $this->render('OChomePageBundle:Default:'.$res.'.html.twig');
  } // otherAction() end
} // class end
