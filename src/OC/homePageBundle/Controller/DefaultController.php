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
      case 'contact': $res = "contact"; break;
      case 'events': $res = "events"; break;
      case 'gallery': $res = "gallery"; break;
      default: $res = "404"; break;
    } // switch end
    return $this->render('OChomePageBundle:Default:'.$res.'.html.twig');
  } // otherAction() end
  
  /*public function fileAction($folder,$file) {
    switch($folder) {
      case 'css': $folder = 'css'; break;
      case 'fonts': $folder = 'fonts'; break;
      case 'img': $folder = 'img'; break;
      case 'js': $folder = 'js'; break;
      default: $this->render('OChomePageBundle:Default:404.html.twig');
    }
    return $this->render('OChomePageBundle:Default:'.$folder.':'.$file);
  }
  
  public function icoAction($file) {
    return $this->render('OChomePageBundle:Default:img:icons:'.$file);
  }*/
  
} // class end
