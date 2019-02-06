<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class portfolioController extends Controller
{
    /**
     * @Route("/affichage/{_locale}/{nom}/{prenom}/{age}/{section}/{_format}" ,
     *defaults={"_format":"html"},
     *requirements={
     *           "section":"JS|PHP",
     *          "age" : "\d{2}",
     *         "_locale" : "fr|en",
     *         "_method":"GET"
     *     })
     */
    public function affichageAction($nom,$prenom,$age,$section,$_locale,$_format)
    {

        return $this->render('@App/portfolio/affichage.html.twig',array('nom'=>$nom,'prenom'=>$prenom,'age'=>$age,'section'=>$section,'_locale'=>$_locale,'_format'=>$_format));
    }

    /**
     * @Route("/cv" ,name="cv")
     */
    public function cvAction()
    {

        return $this->render('@App/portfolio/cv.html.twig');
    }
}
