<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // on récupère toutes les articles
        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('AppBundle:Article')->findAll();
        $rub  = $em->getRepository('AppBundle:Section')->findAll();
        // on appel la vue et on y affiche les news
        return $this->render('default/index.html.twig', [
            "thenews"=>$news,
            "sections"=>$rub
        ]);
    }
}