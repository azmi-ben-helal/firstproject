<?php

namespace AppBundle\Repository;

/**
 * PersoneRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PersoneRepository extends \Doctrine\ORM\EntityRepository
{

   public function getPersonneByAge($ageMin,$ageMax){
$query=$this->createQueryBuilder('p')
    ->where('p.age <= :agemax')
    ->andWhere('p.age >=:agemin')
    ->setParameters(array(
        'agemin'=>$ageMin,
        'agemax'=>$ageMax,
        ))
    ->getQuery();
 return $query->getResult();

   }
}
