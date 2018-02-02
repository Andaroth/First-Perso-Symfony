<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
  public function indexAction()
  {
    // return new Response("Notre propre Hello World !");
    $content = $this
      ->get('templating')
      ->render('OCPlatformBundle:Advert:index.html.twig',
      array(
        "hello" => "Hello World !"
      ));
    return new Response($content);
  }
  
  public function viewAction($id) {
    $url = $this->generateUrl('oc_platform_view');
    $content = $this
      ->get('templating')
      ->render('OCPlatformBundle:Advert:view.html.twig',
      array(
        'id' => $id,
        'url' => $url
      ));
    return new Response($content);
  }
  
  public function viewSlugAction($year,$slug,$format) {
    return new Response("Vous &ecirc;tes en ".$year.", sur la page \"".$slug.".".$format."\"");
  }
  
  /*public function viewSlugAction($year,$slug,$format) {
        return new Response("L'année choisie est ".$year." ");
  }*/
}