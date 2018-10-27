<?php

namespace MainBundle\Controller;

use MainBundle\Entity\People;
use MainBundle\Entity\Race;
use MainBundle\Entity\Regime;
use MainBundle\Entity\Religion;
use MainBundle\Entity\Technology;
use MainBundle\Form\PeopleType;
use MainBundle\Form\SocietyType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MainBundle\Entity\Society;
use MainBundle\Entity\User;
use MainBundle\Entity\Parameters;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function connectAction(){
        $entitymanager = $this->getDoctrine()->getManager();
        $iduser = $this->getUser()->getId();
        $current_user = $this->getUser();
        $parameters = $entitymanager->getRepository(Parameters::class)->findBy(['user' => $iduser]);
        $society = $entitymanager->getRepository(Society::class)->findOneBy(['user' => $iduser]);


        if( !$parameters || $parameters === "" || $parameters === null ){
            $this->createParameters($entitymanager,$current_user);
        }

        if( !$society || $society === "" || $society === null ){
            $this->createData($entitymanager,$current_user);
        }

        return $this->render('@Main/Default/home.html.twig');
    }

    public function createData($em,$user){
        $society = new Society();
        $people = new People();
        $technology = new Technology();
        $religion = new Religion();
        $regime = new Regime();
        $race = new Race();

        $society->setUser($user);
        $people->setSociety($society);
        $race->setPeople($people);
        $religion->setPeople($people);
        $technology->setSociety($society);
        $regime->setSociety($society);
        $em->persist($society);
        $em->persist($people);
        $em->persist($race);
        $em->persist($religion);
        $em->persist($technology);
        $em->persist($regime);
        $em->flush();
    }

    public function createParameters($em,$user){
        $parameters = new Parameters();
        $parameters->setUser($user);
        $parameters->setTutorial(1);
        $parameters->setFirstTime(1);
        $em->persist($parameters);
        $em->flush();
    }

    public function indexAction()
    {
        return $this->render('@Main/Default/index.html.twig');
    }
}
