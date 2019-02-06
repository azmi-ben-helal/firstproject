<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Catalogue\TargetOperation;


class ToDoControllerController extends Controller
{


    /**
     * @Route("/index")
     */
    public function indexAction(Request $request)
    {
        $session=$request->getSession();
        if(!$session->has('mesTaches')){
            $mesTaches=array();
            $session->set('mesTaches',$mesTaches);
        }else{
            $mesTaches=$session->get('mesTaches');
        }
        //$session->clear();
        return $this->render('@App/ToDoController/index.html.twig');

    }
    /**
     * @Route("index/addToDo/{title}/{commentaire}")
     */
    public function addToDoAction($title,$commentaire ,Request $request )
    {
        $session=$request->getSession();
        $mesTaches=$session->get('mesTaches');


        if(isset($mesTaches)){
            if(isset($mesTaches[$title])){

                $session->getFlashBag()->add('miseajour','mise a jour');

            }else{

                $session->getFlashBag()->add('ajout','ajout');
            }

        }   $mesTaches[$title]=$commentaire;
        $session->set('mesTaches',$mesTaches);

        return $this->forward('AppBundle:ToDoController:index');

    }

    /**
     * @Route("index/deleteToDo/{title}")
     */
    public function deleteToDoAction($title,Request $request)
    {

        $session = $request->getSession();
        $mesTaches = $session->get('mesTaches');


    if(isset($mesTaches[$title])){
        unset($mesTaches[$title]);
        $session->set('mesTaches',$mesTaches);
        $session->getFlashBag()->add('supprimer','supprimer');
    }
else{
    $session->getFlashBag()->add('nonvalide','input nom valide');

}

        return $this->forward('AppBundle:ToDoController:index');


    }
    /**
     * @Route("/resetToDo")
     */
    public function resetToDoAction()
    {
        return $this->render('@App/ToDoController/reset_to_do.html.twig', array(
            // ...
        ));
    }

}
