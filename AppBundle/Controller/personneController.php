<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Personne;


class personneController extends Controller
{
    /**
     * @Route("/cvs")
     */
    public function cvsAction()
    {

        $persones=array(
    );
       $haithem=new Personne('haithem','ardhawi',36 ,'../images/me.jpg');
        $jerbi=new Personne('groun','mohamed',25,'');
        $azmi=new Personne('benhelal','azmi',30,'');
        $aymen=new Personne('selouati','aymen',37,'');

        array_push($persones,$haithem);
        array_push($persones,$jerbi);
        array_push($persones,$azmi);
        array_push($persones,$aymen);


        return $this->render('@App/personne/cvs.html.twig',array(
            'personnes' => $persones
        ));
    }

}
