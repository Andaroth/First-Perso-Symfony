<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; // N'oubliez pas ce use !
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
  
  public function viewAction($id, Request $request) {
    $url = $this->generateUrl('oc_platform_view');
    $tag = $request->query->get('tag');
    if (!($request->isMethod('POST'))) {
      $content = $this
      ->get('templating')
      ->render('OCPlatformBundle:Advert:view.html.twig',
      array(
        'id' => $id,
        'url' => $url,
        'tag' => $tag,
        'first' => "first",
        'second' => "second"
      ));
    } else {
      $content = $this
      ->get('templating')
      ->render('OCPlatformBundle:Advert:view.html.twig',
      array(
        'id' => $id,
        'url' => $url,
        'tag' => $tag,
        'first' => $request->request->get('first'),
        'second' => $request->request->get('second')
      ));
    } // else end
    return new Response($content);
  }
  
  public function viewSlugAction($year,$slug,$format) {
    return new Response("Vous &ecirc;tes en ".$year.", sur la page \"".$slug.".".$format."\"");
  }
  
}