<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Area;
use MainBundle\Entity\City;
use MainBundle\Entity\People;
use MainBundle\Entity\Person;
use MainBundle\Entity\Planet;
use MainBundle\Entity\Race;
use MainBundle\Entity\Regime;
use MainBundle\Entity\Region;
use MainBundle\Entity\Religion;
use MainBundle\Entity\Solar;
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

    public function connectAction(Request $request){
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

        $form = $this->createForm(SocietyType::class, $society);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entitymanager->flush();
        }

        return $this->render('@Main/Default/home.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function createData($em,$user){
        $society = new Society();
        $people = new People();
        $technology = new Technology();
        $religion = new Religion();
        $regime = new Regime();
        $solar = new Solar();
        $planet = new Planet();
        $region = new Region();
        $city = new City();
        $race = new Race();
        $adam = new Person();
        $eve = new Person();

        $society->setUser($user)->setStage('Prehistory');
        $people->setSociety($society)->setPopulation(2);
        $race->setPeople($people);
        $religion->setPeople($people);
        $technology->setSociety($society);
        $regime->setSociety($society);
        $planet->setSolar($solar);
        $region->setPlanet($planet);
        $city->setRegion($region)->setSociety($society);
        $adam->setPeople($people)->setGender(1)->setCity($city);
        $eve->setPeople($people)->setGender(0)->setCity($city);

        $em->persist($society);
        $em->persist($people);
        $em->persist($race);
        $em->persist($religion);
        $em->persist($technology);
        $em->persist($regime);
        $em->persist($adam);
        $em->persist($eve);
        $em->persist($solar);
        $em->persist($planet);
        $em->persist($region);
        $em->persist($city);
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

    public function deleteGameDataAction(){
        $entitymanager = $this->getDoctrine()->getManager();
        $iduser = $this->getUser()->getId();
        $society = $entitymanager->getRepository(Society::class)->findOneBy(['user' => $iduser]);
        $peoples = $entitymanager->getRepository(People::class)->findBy(['society' => $society->getId()]);
        $regime = $entitymanager->getRepository(Regime::class)->findOneBy(['society' => $society->getId()]);
        $technology = $entitymanager->getRepository(Technology::class)->findOneBy(['society' => $society->getId()]);
        $cities = $entitymanager->getRepository(City::class)->findBy(['society' => $society->getId()]);
        $regions = $entitymanager->getRepository(Region::class)->findAll();
        $planets = $entitymanager->getRepository(Planet::class)->findAll();
        $solars = $entitymanager->getRepository(Solar::class)->findAll();

        foreach($peoples as $people){
            $race = $entitymanager->getRepository(Race::class)->findOneBy(['people' => $people->getId()]);
            if($race != null){
                $entitymanager->remove($race);
            }
            $persons = $entitymanager->getRepository(Person::class)->findBy(['people' => $people->getId()]);
            foreach ($persons as $person){
                if($person != null){
                    $entitymanager->remove($person);
                }
            }
            $religion = $entitymanager->getRepository(Religion::class)->findOneBy(['people' => $people->getId()]);
            if($religion != null){
                $entitymanager->remove($religion);
            }
            $entitymanager->remove($people);
        }

        foreach($cities as $city){
            if($city != null){
                $entitymanager->remove($city);
            }
        }
        foreach($regions as $region){
            if($region != null){
                $entitymanager->remove($region);
            }
        }
        foreach($planets as $planet){
            if($planet != null){
                $entitymanager->remove($planet);
            }
        }
        foreach($solars as $solar) {
            if ($solar != null) {
                $entitymanager->remove($solar);
            }
        }

        if($technology != null){
            $entitymanager->remove($technology);
        }
        if($regime != null){
            $entitymanager->remove($regime);
        }
        if($society != null){
            $entitymanager->remove($society);
        }
        if($society != null){
            $entitymanager->remove($society);
        }

        $entitymanager->flush();
        return $this->render('@Main/Default/delete.html.twig');
    }

    public function dashboardAction(){
        $entitymanager = $this->getDoctrine();
        $manager = $this->getDoctrine()->getManager();
        $iduser = $this->getUser()->getId();
        $society = $manager->getRepository(Society::class)->findOneBy(['user' => $iduser]);
        $peoples = $manager->getRepository(People::class)->findBy(['society' => $society->getId()]);
        $cities = $manager->getRepository(City::class)->findBy(['society' => $society->getId()]);


        foreach ($peoples as $people){
            $globalPopulation =+ $people->getPopulation();
            $peoplesPopulation = $people->getCityPopulation();
            $persons = $people->getPerson();
            $globalPeoplePopulation = 0;
            foreach ($persons as $person){
                $globalPeoplePopulation = $globalPeoplePopulation+1;
            }
            foreach ($peoplesPopulation as $peoplePopulation){
                $globalPeoplePopulation = $globalPeoplePopulation +$peoplePopulation->getPopulation();
            }
            $people->setPopulation($globalPeoplePopulation);
            $manager->persist($people);
        }

        foreach ($cities as $city){
            $persons = $entitymanager->getRepository(Person::class)->findBy(['city' => $city->getId()]);
            $globalCityPopulation = 0;
            foreach ($persons as $person){
                $globalCityPopulation = $globalCityPopulation+1;
            }
            $citiesPopulation = $city->getCityPopulation();
            foreach ($citiesPopulation as $cityPopulation){
                $globalCityPopulation = $globalCityPopulation + $cityPopulation->getPopulation();
            }
            $city->setPopulation($globalCityPopulation);
            $manager->persist($city);
        }

        $society->setPopulation($globalPopulation);
        $manager->persist($society);
        $manager->flush();

        return $this->render('@Main/Default/dashboard.html.twig',array(
            'society' => $society,
        ));
    }

    public function planetDashboardAction($idSelectedPlanet){
        $entitymanager = $this->getDoctrine();
        $manager = $this->getDoctrine()->getManager();
        $planets = $entitymanager->getRepository(Planet::class)->findAll();
        if($idSelectedPlanet!=null){
            $selectedPlanet = $entitymanager->getRepository(Planet::class)->find($idSelectedPlanet);
            $regions = $entitymanager->getRepository(Region::class)->findBy(['planet'=>$idSelectedPlanet]);
            foreach ($regions as $region){
                $regionsMap[]=$region->getSeed();

            }
        } else{
            $selectedPlanet = null;
        }
        return $this->render('@Main/Default/planet_dashboard.html.twig',array(
            'allPlanets' => $planets,
            'selectedPlanet' => $selectedPlanet,
            'regions' => $regions,
        ));
    }

    public function createPlanetAction(){
        $planet = new Planet();
        $planet->setName('Test'.$planet->getId());
        $entitymanager = $this->getDoctrine()->getManager();
        $bigY = array();
        $entitymanager->persist($planet);
        $entitymanager->flush();

        for ($i = 0; $i <= 5; $i++) {
            $bigY[$i] = array();
            for ($j = 0; $j <= 5; $j++) {
                $region = new Region();
                $region->setPlanet($planet);
                //$region->setSeed($this->createRegionSeed());
                $entitymanager->persist($region);
                $entitymanager->flush();
                $bigY[$i][]= $region->getId();
            }
        }
        $planet->setRegionMapping($bigY);
        $entitymanager->persist($planet);
        $entitymanager->flush();

        return $this->render('@Main/Default/test.html.twig');
    }

    public function checkId(){
        $entitymanager = $this->getDoctrine()->getManager();
        $regions = $entitymanager->getRepository(Region::class)->findAll();
        $found=false;
        foreach ($regions as $region){
            for ($i=0;$found!=true;$i++){
                if ($region->getId()===$i){

                } else {
                    $thisIdEmpty = $i;
                    $found = true;
                }
            }
        }
        return $thisIdEmpty;
    }

    public function mapAction(){
        $manager = $this->getDoctrine()->getManager();
        $region = $manager->getRepository(Region::class)->find(8);
        $planet = $region->getPlanet();

        $area = $manager->getRepository(Area::class)->findAll();
        $areaLenght = count($area,1)-1;
        $rand = rand(0,$areaLenght);

        $Y = array();
        for ($i = 0; $i <= 20; $i++) {
            $Y[$i] = array();
            for ($j = 0; $j <= 20; $j++) {
                $Y[$i][]=$area[0]->getType();
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            $Y = $this->createLake($area,$Y);
        }

        $region->setSeed($Y);
        $manager->persist($region);
        $manager->flush();
        return $this->render('@Main/Default/map.html.twig',array(
            'map' => $Y,
        ));
    }

    public function createRegionSeed(){
        $manager = $this->getDoctrine()->getManager();
        $area = $manager->getRepository(Area::class)->findAll();
        $areaLenght = count($area,1)-1;
        $rand = rand(0,$areaLenght);

        $Y = array();
        for ($i = 0; $i <= 20; $i++) {
            $Y[$i] = array();
            for ($j = 0; $j <= 20; $j++) {
                $Y[$i][]=$area[0]->getType();
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            $Y = $this->createLake($area,$Y);
        }

        return $Y;
    }

    public function tryAlready($dx,$dy,$arrays,$Y){
        $answer =false;
        foreach ($arrays as $array){
            if ($dy == $array[1] && $dx == $array[0]){
                $answer = true;
                break;
            }
        }
        return $answer;
    }

    // Lake creation
    public function createLake($area,$Y){
        $randX = rand(0,20);
        $randY = rand(0,20);
        $lakeSize = rand(10,20);
        $lakeWidth = rand(5,10);
        $lakeHeight = rand(5,10);
        $maxYX = [21,21];
        $card = ['up','right','down','left'];

        $alreadyDone[] = [$randX,$randY];

        $Y[$randY][$randX] = $area[9]->getType();

        for ($i = 1; $i <= $lakeSize-1;$i++) {
            $DX = $randX;
            $DY = $randY;
            $j=1;
            while ($j !=0){
                if ($this->tryAlready($DX,$DY,$alreadyDone,$Y)===true && $DX < $maxYX[1] && $DY < $maxYX[0] && $DX>=0 && $DY >= 0){
                    $direction = $card[rand(0,3)];
                    switch ($direction){
                        case 'up':
                            $DY--;
                            break;
                        case 'down':
                            $DY++;
                            break;
                        case 'right':
                            $DX++;
                            break;
                        case 'left':
                            $DX--;
                            break;
                    }
                } elseif ($this->tryAlready($DX,$DY,$alreadyDone,$Y)===false && $DX < $maxYX[1] && $DY < $maxYX[0] && $DX>=0 && $DY >= 0) {
                    $Y[$DY][$DX] = $area[9]->getType();
                    $alreadyDone[] = [$DX,$DY];
                    $j=0;
                } else {
                    if ($DY>=$maxYX[0]){
                        $DY--;
                    } elseif($DY<0){
                        $DY++;
                    }
                    if($DX>=$maxYX[0]){
                        $DX--;
                    } elseif($DX<0){
                        $DX++;
                    }
                }
            }
        }
        return $Y;
    }

    public function indexAction()
    {
        return $this->render('@Main/Default/index.html.twig');
    }
}
