<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //recuperer notre session
      $session=$request->getSession();
      //recuperer ma vavaribale de session
      $maVariable=$session->get('maVariable');

      if(isset ($maVariable)){

          echo 'session deja ouverte est j\'ai recuperer ma: '.$maVariable;
      }else
             'j\inialise ma session et insertion ma nouvelle variable';
      //insertion d'une nouvelle variable
        $session->set('maVariable','azmi');

        //$session->clear();

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
