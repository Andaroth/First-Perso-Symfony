<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

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
    $url = $this
      ->get('router')
      ->generate(
        'oc_platform_view', // 1er argument : le nom de la route
        array('id' => $id)    // 2e argument : les valeurs des paramètres
      );
    return new Response("L'URL de l'ID ".$id." est ".$url);
  }
  
  /*public function viewSlugAction($year,$slug,$format) {
        return new Response("L'année choisie est ".$year." ");
  }*/
}