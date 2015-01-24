<?php

namespace Kasia\PanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KasiaPanBundle:Default:index.html.twig', array());
    }

    public function booksAction($book)
    {
        return $this->render('KasiaPanBundle:Books:k'.$book.'.html.twig', array());
    }
}
