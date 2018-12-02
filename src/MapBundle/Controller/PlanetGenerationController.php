<?php

namespace MapBundle\Controller;

use MapBundle\Entity\Planet;
use MapBundle\Entity\Region;
use MapBundle\Entity\Solar;
use MapBundle\Form\NewPlanetType;
use MapBundle\Form\NewSolarType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class PlanetGenerationController extends Controller
{

    public function newSolarAction(Request $request){
        $solar = new Solar();
        $form = $this->createForm(NewSolarType::class, $solar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $solar= $form->getData();
            $entitymanager = $this->getDoctrine()->getManager();
            $entitymanager->persist($solar);
            $entitymanager->flush();

        }

        return $this->render('@Admin/Dashboard/newsolar.html.twig',array(
            'form'=>$form->createView(),
        ));
    }


    public function newPlanetAction(Request $request){
        $planet = new Planet();
        $form = $this->createForm(NewPlanetType::class, $planet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $planet = $form->getData();
            $em = $this->getDoctrine();
            $entitymanager = $this->getDoctrine()->getManager();
            $bigY = array();
            $entitymanager->persist($planet);
            $entitymanager->flush();

            $regionGenerationController = $this->container->get('map_region_generation');

            $temperature = $planet->getTemperature();
            $precipitation = $planet->getPrecipitation();
            $toxicity = $planet->getToxicity();
            $atmosphere = $planet->getAtmosphere();
            $biomeArray = $this->createPlanetBiome($precipitation,$temperature,$toxicity,$atmosphere);
            //$map = $em->getRepository(Region::class)->createRegionSeed($biomeArray);
            $map = $regionGenerationController->createRegionSeed($biomeArray);

            for ($i = 0; $i < 5; $i++) {
                $bigY[$i] = array();
                for ($j = 0; $j < 5; $j++) {
                    $region = new Region();
                    $region->setPlanet($planet);
                    $region->setSeed($map[$i][$j]);
                    $entitymanager->persist($region);
                    $entitymanager->flush();
                    $bigY[$i][]= $region->getId();
                }
            }
            $planet->setRegionMapping($bigY);
            $entitymanager->persist($planet);
            $entitymanager->flush();
        }

        return $this->render('@Admin/Dashboard/newplanet.html.twig',array(
            'form'=>$form->createView(),
        ));
    }

    public function createPlanetBiome($prec,$temp,$toxi,$atm){
        $totalCell = 10000;

        if ($prec>1.75){
            $biomeArray = $this->prec175($temp,$atm);
        } elseif ($prec>1.50){
            $biomeArray = $this->prec150($temp,$atm);
        } elseif ($prec>1.25){
            $biomeArray = $this->prec125($temp,$atm);
        } elseif ($prec>1.00){
            $biomeArray = $this->prec100($temp,$atm);
        } elseif ($prec>0.75){
            $biomeArray = $this->prec075($temp,$atm);
        } elseif ($prec>0.50){
            $biomeArray = $this->prec050($temp,$atm);
        } elseif ($prec>0.25){
            $biomeArray = $this->prec025($temp,$atm);
        } else {
            $biomeArray = $this->prec000($temp,$atm);
        }

        if($temp>=1){
            $biomeArray['water_count'] = $biomeArray['water_count']/$temp;
        } else {
            $biomeArray['water_count'] = $biomeArray['water_count']*$temp;
        }


        return $biomeArray;
    }

    public function prec175($temp,$atm){
        $biomeArray = array();

        $biomeArray['vegetation_density'] = $this->vegetation175($atm);
        $biomeArray['land_type'] = $this->land175($temp);
        $biomeArray['water_count'] = 4000;

        return $biomeArray;
    }
    public function prec150($temp,$atm){
        $biomeArray['vegetation_density'] = $this->vegetation150($atm);
        $biomeArray['land_type'] = $this->land150($temp);
        $biomeArray['water_count'] = 3000;

        return $biomeArray;
    }
    public function prec125($temp,$atm){
        $biomeArray['vegetation_density'] = $this->vegetation125($atm);
        $biomeArray['land_type'] = $this->land125($temp);
        $biomeArray['water_count'] = 2500;
        return $biomeArray;
    }
    public function prec100($temp,$atm){
        $biomeArray['vegetation_density'] = $this->vegetation100($atm);
        $biomeArray['land_type'] = $this->land100($temp);
        $biomeArray['water_count'] = 2000;
        return $biomeArray;
    }
    public function prec075($temp,$atm){
        $biomeArray['vegetation_density'] = $this->vegetation075($atm);
        $biomeArray['land_type'] = $this->land075($temp);
        $biomeArray['water_count'] = 1500;
        return $biomeArray;
    }
    public function prec050($temp,$atm){
        $biomeArray['vegetation_density'] = $this->vegetation050($atm);
        $biomeArray['land_type'] = $this->land050($temp);
        $biomeArray['water_count'] = 1000;
        return $biomeArray;
    }
    public function prec025($temp,$atm){
        $biomeArray['vegetation_density'] = $this->vegetation025($atm);
        $biomeArray['land_type'] = $this->land025($temp);
        $biomeArray['water_count'] = 500;
        $biomeArray['water_location'] = 0;

        return $biomeArray;
    }
    public function prec000($temp,$atm){
        $biomeArray['vegetation_density'] = $this->vegetation000($atm);
        $biomeArray['land_type'] = $this->land000($temp);
        $biomeArray['water_count'] = 100;

        return $biomeArray;
    }

    public function land175($temp){
        if ($temp>1.75){
            $landBiome = 'sand';
        }
        elseif ($temp>1.50){
            $landBiome = 'earth';
        }
        elseif ($temp>1.25){
            $landBiome = 'grass';
        }
        elseif ($temp>1.00){
            $landBiome = 'mud';
        }
        elseif ($temp>0.75){
            $landBiome = 'swamp';
        }
        elseif ($temp>0.50){
            $landBiome = 'ice';
        }
        elseif ($temp>0.25){
            $landBiome = 'ice';
        } else{
            $landBiome = 'ice';
        }
        return $landBiome;
    }
    public function land150($temp){
        if ($temp>1.75){
            $landBiome = 'sand';
        }
        elseif ($temp>1.50){
            $landBiome = 'earth';
        }
        elseif ($temp>1.25){
            $landBiome = 'grass';
        }
        elseif ($temp>1.00){
            $landBiome = 'mud';
        }
        elseif ($temp>0.75){
            $landBiome = 'swamp';
        }
        elseif ($temp>0.50){
            $landBiome = 'ice';
        }
        elseif ($temp>0.25){
            $landBiome = 'ice';
        } else{
            $landBiome = 'ice';
        }

        return $landBiome;
    }
    public function land125($temp){
        if ($temp>1.75){
            $landBiome = 'sand';
        }
        elseif ($temp>1.50){
            $landBiome = 'sand';
        }
        elseif ($temp>1.25){
            $landBiome = 'earth';
        }
        elseif ($temp>1.00){
            $landBiome = 'mud';
        }
        elseif ($temp>0.75){
            $landBiome = 'mud';
        }
        elseif ($temp>0.50){
            $landBiome = 'snow';
        }
        elseif ($temp>0.25){
            $landBiome = 'snow';
        } else{
            $landBiome = 'ice';
        }

        return $landBiome;
    }
    public function land100($temp){
        if ($temp>1.75){
            $landBiome = 'sand';
        }
        elseif ($temp>1.50){
            $landBiome = 'sand';
        }
        elseif ($temp>1.25){
            $landBiome = 'earth';
        }
        elseif ($temp>1.00){
            $landBiome = 'grass';
        }
        elseif ($temp>0.75){
            $landBiome = 'grass';
        }
        elseif ($temp>0.50){
            $landBiome = 'snow';
        }
        elseif ($temp>0.25){
            $landBiome = 'snow';
        } else{
            $landBiome = 'snow';
        }

        return $landBiome;
    }
    public function land075($temp){
        if ($temp>1.75){
            $landBiome = 'sand';
        }
        elseif ($temp>1.50){
            $landBiome = 'sand';
        }
        elseif ($temp>1.25){
            $landBiome = 'earth';
        }
        elseif ($temp>1.00){
            $landBiome = 'grass';
        }
        elseif ($temp>0.75){
            $landBiome = 'grass';
        }
        elseif ($temp>0.50){
            $landBiome = 'snow';
        }
        elseif ($temp>0.25){
            $landBiome = 'snow';
        } else{
            $landBiome = 'earth';
        }

        return $landBiome;
    }
    public function land050($temp){
        if ($temp>1.75){
            $landBiome = 'sandstone';
        }
        elseif ($temp>1.50){
            $landBiome = 'sand';
        }
        elseif ($temp>1.25){
            $landBiome = 'sand';
        }
        elseif ($temp>1.00){
            $landBiome = 'earth';
        }
        elseif ($temp>0.75){
            $landBiome = 'earth';
        }
        elseif ($temp>0.50){
            $landBiome = 'earth';
        }
        elseif ($temp>0.25){
            $landBiome = 'earth';
        } else{
            $landBiome = 'frozenearth';
        }

        return $landBiome;
    }
    public function land025($temp){
        if ($temp>1.75){
            $landBiome = 'sandstone';
        }
        elseif ($temp>1.50){
            $landBiome = 'sandstone';
        }
        elseif ($temp>1.25){
            $landBiome = 'sand';
        }
        elseif ($temp>1.00){
            $landBiome = 'sand';
        }
        elseif ($temp>0.75){
            $landBiome = 'earth';
        }
        elseif ($temp>0.50){
            $landBiome = 'earth';
        }
        elseif ($temp>0.25){
            $landBiome = 'earth';
        } else{
            $landBiome = 'frozenearth';
        }

        return $landBiome;
    }
    public function land000($temp){
        if ($temp>1.75){
            $landBiome = 'rock';
        }
        elseif ($temp>1.50){
            $landBiome = 'sandstone';
        }
        elseif ($temp>1.25){
            $landBiome = 'sandstone';
        }
        elseif ($temp>1.00){
            $landBiome = 'sand';
        }
        elseif ($temp>0.75){
            $landBiome = 'sand';
        }
        elseif ($temp>0.50){
            $landBiome = 'earth';
        }
        elseif ($temp>0.25){
            $landBiome = 'frozenearth';
        } else{
            $landBiome = 'frozenearth';
        }
        return $landBiome;
    }

    public function vegetation175($atm){
        if ($atm>1.75){
            $vegetationDensity = 'worldforest';
        }
        elseif ($atm>1.50){
            $vegetationDensity = 'oldforest';
        }
        elseif ($atm>1.25){
            $vegetationDensity = 'oldforest';
        }
        elseif ($atm>1.00){
            $vegetationDensity = 'jungle';
        }
        elseif ($atm>0.75){
            $vegetationDensity = 'jungle';
        }
        elseif ($atm>0.50){
            $vegetationDensity = 'forest';
        }
        elseif ($atm>0.25){
            $vegetationDensity = 'littleforest';
        } else{
            $vegetationDensity = 'woods';
        }
        return $vegetationDensity;
    }
    public function vegetation150($atm){
        if ($atm>1.75){
            $vegetationDensity = 'oldforest';
        }
        elseif ($atm>1.50){
            $vegetationDensity = 'oldforest';
        }
        elseif ($atm>1.25){
            $vegetationDensity = 'jungle';
        }
        elseif ($atm>1.00){
            $vegetationDensity = 'jungle';
        }
        elseif ($atm>0.75){
            $vegetationDensity = 'forest';
        }
        elseif ($atm>0.50){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>0.25){
            $vegetationDensity = 'littleforest';
        } else{
            $vegetationDensity = 'woods';
        }
        return $vegetationDensity;
    }
    public function vegetation125($atm){
        if ($atm>1.75){
            $vegetationDensity = 'oldforest';
        }
        elseif ($atm>1.50){
            $vegetationDensity = 'jungle';
        }
        elseif ($atm>1.25){
            $vegetationDensity = 'jungle';
        }
        elseif ($atm>1.00){
            $vegetationDensity = 'forest';
        }
        elseif ($atm>0.75){
            $vegetationDensity = 'forest';
        }
        elseif ($atm>0.50){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>0.25){
            $vegetationDensity = 'littleforest';
        } else{
            $vegetationDensity = 'bush';
        }
        return $vegetationDensity;
    }
    public function vegetation100($atm){
        if ($atm>1.75){
            $vegetationDensity = 'jungle';
        }
        elseif ($atm>1.50){
            $vegetationDensity = 'jungle';
        }
        elseif ($atm>1.25){
            $vegetationDensity = 'forest';
        }
        elseif ($atm>1.00){
            $vegetationDensity = 'forest';
        }
        elseif ($atm>0.75){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>0.50){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>0.25){
            $vegetationDensity = 'woods';
        } else{
            $vegetationDensity = 'bush';
        }
        return $vegetationDensity;
    }
    public function vegetation075($atm){
        if ($atm>1.75){
            $vegetationDensity = 'jungle';
        }
        elseif ($atm>1.50){
            $vegetationDensity = 'forest';
        }
        elseif ($atm>1.25){
            $vegetationDensity = 'forest';
        }
        elseif ($atm>1.00){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>0.75){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>0.50){
            $vegetationDensity = 'woods';
        }
        elseif ($atm>0.25){
            $vegetationDensity = 'woods';
        } else{
            $vegetationDensity = 'bush';
        }
        return $vegetationDensity;
    }
    public function vegetation050($atm){
        if ($atm>1.75){
            $vegetationDensity = 'forest';
        }
        elseif ($atm>1.50){
            $vegetationDensity = 'forest';
        }
        elseif ($atm>1.25){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>1.00){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>0.75){
            $vegetationDensity = 'woods';
        }
        elseif ($atm>0.50){
            $vegetationDensity = 'woods';
        }
        elseif ($atm>0.25){
            $vegetationDensity = 'bush';
        } else{
            $vegetationDensity = 'bush';
        }
        return $vegetationDensity;
    }
    public function vegetation025($atm){
        if ($atm>1.75){
            $vegetationDensity = 'forest';
        }
        elseif ($atm>1.50){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>1.25){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>1.00){
            $vegetationDensity = 'woods';
        }
        elseif ($atm>0.75){
            $vegetationDensity = 'woods';
        }
        elseif ($atm>0.50){
            $vegetationDensity = 'bush';
        }
        elseif ($atm>0.25){
            $vegetationDensity = 'bush';
        } else{
            $vegetationDensity = 'none';
        }
        return $vegetationDensity;
    }
    public function vegetation000($atm){
        if ($atm>1.75){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>1.50){
            $vegetationDensity = 'littleforest';
        }
        elseif ($atm>1.25){
            $vegetationDensity = 'woods';
        }
        elseif ($atm>1.00){
            $vegetationDensity = 'woods';
        }
        elseif ($atm>0.75){
            $vegetationDensity = 'bush';
        }
        elseif ($atm>0.50){
            $vegetationDensity = 'bush';
        }
        elseif ($atm>0.25){
            $vegetationDensity = 'none';
        } else{
            $vegetationDensity = 'none';
        }
        return $vegetationDensity;
    }



}
