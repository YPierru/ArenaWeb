<?php

App::uses('AppModel', 'Model');
App::uses('Fighter', 'Model');

class Tool extends AppModel {
    
    public function giveToFighter($toolFound){
        $_SESSION["idFighterSelected"]=1;
    	$toolFound["fighter_id"]=$_SESSION["idFighterSelected"];
    	$this->save($toolFound);
    	
        $fighterModel=new Fighter();
        $currentFighter = $fighterModel->find("first",array("conditions"=>array("Fighter.id"=>$_SESSION["idFighterSelected"])))["Fighter"];
        $toolType=$toolFound["type"];
        $toolBonus=$toolFound["bonus"];

        if($toolType=="sightUp"){
            $currentFighter["skill_sight"]+=$toolBonus;

        }elseif($toolType=="strengthUp"){
            $currentFighter["skill_strength"]+=$toolBonus;

        }elseif($toolType=="healthUp"){
            $currentFighter["skill_health"]+=$toolBonus;

        }

        $fighterModel->save($currentFighter);
    }


    public function dropTool($toolToDrop){
    	$toolToDrop["fighter_id"]=null;
    	$this->save($toolToDrop);

    	
        $fighterModel=new Fighter();
        $currentFighter = $fighterModel->find("first",array("conditions"=>array("Fighter.id"=>$_SESSION["idFighterSelected"])))["Fighter"];
        $toolType=$toolToDrop["type"];
        $toolBonus=$toolToDrop["bonus"];

        if($toolType=="sightUp"){
            $currentFighter["skill_sight"]-=$toolBonus;

        }elseif($toolType=="strengthUp"){
            $currentFighter["skill_strength"]-=$toolBonus;

        }elseif($toolType=="healthUp"){
            $currentFighter["skill_health"]-=$toolBonus;

        }

        $fighterModel->save($currentFighter);
    }


}



?>