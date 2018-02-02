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
}