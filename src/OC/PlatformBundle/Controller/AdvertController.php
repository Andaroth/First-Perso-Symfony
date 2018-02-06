<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; // N'oubliez pas ce use !
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    if ($request->isMethod('POST')) { // if form
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
    } else {
      $content = $this
      ->get('templating')
      ->render('OCPlatformBundle:Advert:view.html.twig',
      array(
        'id' => $id,
        'url' => $url,
        'tag' => $tag
      ));
    } // else end
    return new Response($content);
  }
  
  public function addAction(Request $request) {
    // La gestion d'un formulaire est particulière, mais l'idée est la suivante :
    // Si la requête est en POST, c'est que le visiteur a soumis le formulaire
    if ($request->isMethod('POST')) {
      // Ici, on s'occupera de la création et de la gestion du formulaire
      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
      // Puis on redirige vers la page de visualisation de cettte annonce
      return $this->redirectToRoute('oc_platform_view', array('id' => 5));
    }
    // Si on n'est pas en POST, alors on affiche le formulaire
    return $this->render('OCPlatformBundle:Advert:add.html.twig');
  }
  
  public function menuAction() {
    $list = array(
      array('id' => 1, 'title' => 'Recherche développeur Symfony'),
      array('id' => 2, 'title' => 'Mission de webmaster'),
      array('id' => 3, 'title' => 'Offre de stage webdesigner') 
    ); // list end
    return $this->render('OCPlatformBundle:Advert:topbar.html.twig', array(
      'list' => $list
    )); // return array end
  }
  
  public function editAction($id, Request $request) {
    // Ici, on récupérera l'annonce correspondante à $id
    // Même mécanisme que pour l'ajout
    if ($request->isMethod('POST')) {
      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
      return $this->redirectToRoute('oc_platform_view', array('id' => $id));
    }
    return $this->render('OCPlatformBundle:Advert:edit.html.twig');
  }
  
  public function deleteAction($id) {
    // Ici, on récupérera l'annonce correspondant à $id
    // Ici, on gérera la suppression de l'annonce en question
    return $this->render('OCPlatformBundle:Advert:delete.html.twig');
  }
  
  public function viewSlugAction($year,$slug,$format) {
    return new Response("Vous &ecirc;tes en ".$year.", sur la page \"".$slug.".".$format."\"");
  }
  
}