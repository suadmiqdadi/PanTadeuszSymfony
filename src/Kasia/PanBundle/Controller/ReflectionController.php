<?php

namespace Kasia\PanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kasia\PanBundle\Entity\Reflection;
use Kasia\PanBundle\Form\ReflectionType;
use Symfony\Component\HttpFoundation\Request;

class ReflectionController extends Controller
{
    public function indexAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository("KasiaPanBundle:Reflection");

        $reflections = $repository->findAll();
        return $this->render('KasiaPanBundle:Reflection:index.html.twig', array('reflections' => $reflections));
    }

    public function addAction(Request $request)
    {
    	$reflection = new Reflection();
    	$form = $this->createForm(new ReflectionType(), $reflection);

    	if ($request->isMethod('POST')
                && $form->handleRequest($request)
                && $form->isValid()
                ) {
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($reflection);
                        $em->flush();
                         return $this->redirect($this->generateUrl('kasia_pan_reflection_index', array()));
                }
        return $this->render('KasiaPanBundle:Reflection:add.html.twig', array('form' => $form->createView()));
    }
}
