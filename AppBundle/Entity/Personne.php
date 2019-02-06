<?php
/**
 * Created by PhpStorm.
 * User: MIRA
 * Date: 11/12/2018
 * Time: 15:26
 */

namespace AppBundle\Entity;


class Personne
{

    public $_nom;
    public $_prenom;
    public $_age ;
    public $_path;


    public function __construct($_nom=null, $_prenom=null, $_age=null, $_path=null)
    {
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
        $this->_age = $_age;
        $this->_path = $_path;
    }
    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->_prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->_path = $path;
    }


    /**
     * Personne constructor.
     * @param $_nom
     * @param $_prenom
     * @param $_age
     * @param $_path
     */


}