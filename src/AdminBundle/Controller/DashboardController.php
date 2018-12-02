<?php

namespace AdminBundle\Controller;

use MapBundle\Entity\Region;
use MapBundle\Entity\Solar;
use MapBundle\Entity\Planet;
use MainBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Admin/Dashboard/index.html.twig');
    }

    public function mapAction(){

        $solars = $this->getDoctrine()
            ->getRepository(Solar::class)
            ->getAllSolars();

        return $this->render('@Admin/Dashboard/map.html.twig',array(
            'solars' => $solars,
        ));
    }

    public function listUserAction(){

        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render('@Admin/Dashboard/users-list.html.twig',array(
            'users' => $users,
        ));
    }

    public function deleteSolarAction($idSelectedSolar){
        $entitymanager = $this->getDoctrine()->getManager();
        $solar = $this->getDoctrine()
            ->getRepository(Solar::class)->find($idSelectedSolar);

        $entitymanager->remove($solar);
        $entitymanager->flush();

        return $this->redirectToRoute('admin_dashboard_map');
    }

    public function deletePlanetAction($idSelectedPlanet){
        $entitymanager = $this->getDoctrine()->getManager();
        $planet = $this->getDoctrine()
            ->getRepository(Planet::class)->find($idSelectedPlanet);

        $entitymanager->remove($planet);
        $entitymanager->flush();

        return $this->redirectToRoute('admin_dashboard_map');
    }

    public function mapOverviewAction($idSelectedPlanet){
        $entitymanager = $this->getDoctrine();
        $manager = $this->getDoctrine()->getManager();
        if($idSelectedPlanet!=null){
            $selectedPlanet = $entitymanager->getRepository(Planet::class)->find($idSelectedPlanet);
            $regions = $entitymanager->getRepository(Region::class)->findBy(['planet'=>$idSelectedPlanet]);
            foreach ($regions as $region){
                $regionsMap[]=$region->getSeed();
            }
        } else{
            $selectedPlanet = null;
        }
        return $this->render('@Admin/Dashboard/map-overview.html.twig',array(
            'selectedPlanet' => $selectedPlanet,
            'regions' => $regions,
        ));
    }

}
