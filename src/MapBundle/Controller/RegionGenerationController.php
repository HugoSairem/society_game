<?php

namespace MapBundle\Controller;

use MapBundle\Entity\Region;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegionGenerationController extends Controller
{
    public function indexAction()
    {
        return $this->render('@RegionGeneration/Dashboard/index.html.twig');
    }

    public function createRegionSeed($biomeArray){
        set_time_limit(0);

        $Y = array();
        for ($i = 0; $i <= 99; $i++) {
            $Y[$i] = array();
            for ($j = 0; $j <= 99; $j++) {
                $Y[$i][]=$biomeArray['land_type'];
            }
        }

        if($biomeArray['water_count'] >=100){
            $waterPlace = $biomeArray['water_count']/100;
        } else {
            $waterPlace = $biomeArray['water_count']/10;
        }

        $waterRemaining = $biomeArray['water_count'];
        $waterDistributed = [];
        $randWater = rand(1,$biomeArray['water_count']);
        $waterDistributed[] = $randWater;
        $waterRemaining = $waterRemaining - $randWater;

        for($i = 1; $i <= $waterPlace || $waterRemaining > 0 ; $i++ ){
            $randWater = rand(1,$waterRemaining);
            $waterDistributed[] = $randWater;
            $waterRemaining = $waterRemaining - $randWater;
            $finalPlace = $i;
        }

        if(!isset($finalPlace) || $finalPlace === null ){
            $finalPlace = 0;
        }

        $waterPlace= $finalPlace;

        $biomeArray['water_distributed']= $waterDistributed;
        $notDone = null;

        for ($i = 1; $i <= $waterPlace; $i++) {
            $tmpArray = $this->createWater($Y,$biomeArray,$biomeArray['water_distributed'][$i-1],$notDone);
            $Y = $tmpArray[0];
            $notDone[] = $tmpArray[1];
        }

        //DECOUPE DE LA MAP EN REGION
        $map =array();

        $basecoordX=0;
        $basecoordY=0;

        $multY=1;
        $multX=1;

        $addY=0;

        for ($i=0;$i<5;$i++){
            $map[$i]=array();
            for ($j=0;$j<5;$j++){
                $map[$i][$j]= array();
                $COORDY =0;
                for ($coordY=$basecoordY+$addY;$coordY<$addY+20;$coordY++){
                    $COORDX = 0;
                    $map[$i][$j][$COORDY]= array();
                    for ($coordX=$basecoordX;$coordX<$basecoordX+20;$coordX++){
                        $map[$i][$j][$COORDY][$COORDX]=$Y[$coordY][$coordX];
                        //On change de X sur map
                        $COORDX++;
                    }
                    $COORDY++;
                    //On change de Y sur map
                }
                $basecoordX=$basecoordX+20;
                $basecoordY=0;
                //On change de X region
            }
            $addY = $addY+20;
            $basecoordX=0;
            //On change de Y region
        }

        return $map;
    }

    public function createWater($Y,$biomeArray,$size,$notDone){
        if ($notDone != null){
            $randX = rand(0,99);
            $randY = rand(0,99);
            while($notDone[0][$randY][$randX] === 'done'){
                $randX = rand(0,99);
                $randY = rand(0,99);
            }

        } else {
            $randX = rand(0,99);
            $randY = rand(0,99);
            $notDone = $Y;
        }

        $lakeSize = $size;
        $lakeWidth = rand(5,10);
        $lakeHeight = rand(5,10);
        $maxYX = [100,100];
        $card = ['up','right','down','left'];
        if($lakeSize>=250){
            $deepWaterSize = $lakeSize/1.25;
        }

        $alreadyDone[] = [$randX,$randY];


        $Y[$randY][$randX] = 'water';

        for ($i = 1; $i <= $lakeSize-1;$i++) {
            $DX = $randX;
            $DY = $randY;
            $j=1;
            while ($j !=0){
                if ($this->tryAlready($DX,$DY,$alreadyDone)===true && $DX < $maxYX[1] && $DY < $maxYX[0] && $DX>=0 && $DY >= 0){
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
                } elseif ($this->tryAlready($DX,$DY,$alreadyDone)===false && $DX < $maxYX[1] && $DY < $maxYX[0] && $DX>=0 && $DY >= 0) {
                    if(isset($deepWaterSize)){
                        if($deepWaterSize>0){
                            $Y[$DY][$DX] = 'deep-water';
                            $deepWaterSize = $deepWaterSize-1;
                        } else {
                            $Y[$DY][$DX] = 'water';
                        }
                    } else {
                        $Y[$DY][$DX] = 'water';
                    }

                    $notDone[$DY][$DX] = 'done';
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

        $array = [$Y,$notDone];

        return $array;
    }

    public function tryAlready($dx,$dy,$arrays){
        $answer =false;
        foreach ($arrays as $array){
            if ($dy == $array[1] && $dx == $array[0]){
                $answer = true;
                break;
            }
        }
        return $answer;
    }


}
