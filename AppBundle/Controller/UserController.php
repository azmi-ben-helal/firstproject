<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Persone;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/list")
     */
    public function listAction()

    {
        //$doctrine=$this->get('doctrine');
        $doctrine = $this->getDoctrine();
        //faire des requete select
        $repository = $doctrine->getRepository('AppBundle:Persone');
        //faire la persistance
        // $em=$doctrine->getManager();
        $users = $repository->findAll();

        return $this->render('@App/User/list.html.twig', array('users' => $users

        ));
    }

    /**
     * @Route("/add")
     */
    public function addAction()
    {
        $users = array(new Persone('zalouzi', 'hichem', 26, ''),
            new Persone('jbali', 'fida', 95, ''),
            new Persone('haboub', 'montasar', 27, ''),
            new Persone('bairem', 'khaled', 28, ''),
            new Persone('ben mlouka', 'manel', 26, ''),


        );
//recuperation de notre EntityManager
        $em = $this->getDoctrine()->getManager();
//on va lui dire de prendre en charge les objet cree

        foreach ($users as $user) {
            $em->persist($user);
        }
        $em->flush();
        return $this->forward('AppBundle:User:list');
    }



    /**
     * @Route("list/AddNew/{nom}/{prenom}/{age}/{path}",
     *
     *requirements={
     *
     *          "age" : "\d{2}",
     *        "path":".*\.jpg|.jpeg|/.png$"
     *
     *     }))
     */
    public function addnewAction($nom,$prenom,$age,$path)
    {
        $em = $this->getDoctrine()->getManager();

        $path2= '../images/';
        $users = new Persone($nom, $prenom,$age, $path2.$path);
        $em->persist($users);
        $em->flush();
        return $this->forward('AppBundle:User:list', array(// ...
        ));
    }







    /**
     * @Route("/delete/{id}")
     */
    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Persone');
        $user=$repository->find($id);
        $em->remove($user);
        $em->flush();
        return $this->forward('AppBundle:User:list', array('user'=>$user
        ));
    }

    /**
     * @Route("list/update/{id}/{nom}/{prenom}/{age}/{path}",
     *     requirements={
     *
     *          "age" : "\d{2}",
     *
     *        "path":".*\.jpg|.jpeg|/.png$"
     *
     *     })))
     */
//
    public function updateAction(Request $request,$id,$nom,$prenom,$age,$path)
    {


     $em=$this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Persone');
        $user=$repository->find($id);

        $user->setNom($nom)
            ->setPrenom($prenom)
            ->setAge($age)
            ->setPath($path);
        $em->persist($user);

            if($user)

        $em->flush();

        return $this->render('@App/User/update.html.twig',array('user'=>$user));
    }

    /**
     * @Route("/get")
     */
    public function getAction()
    {

        $doctrine = $this->getDoctrine();
        //faire des requete select
        $repository = $doctrine->getRepository('AppBundle:Persone');
        //faire la persistance
        // $em=$doctrine->getManager();
        $users = $repository->getPersonneByAge(20, 40);
        return $this->render('@App/User/list.html.twig', array(
            'users' => $users
        ));
    }

}
