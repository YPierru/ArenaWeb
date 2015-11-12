<?php

App::uses('AppModel', 'Model');
App::uses('Fighter', 'Model');

class Tool extends AppModel {
    
    public function giveToFighter($toolFound){
        App::uses('CakeSession', 'Model/Datasource');
        $idFighterSelected=CakeSession::read('User.fighter');
    	$toolFound["fighter_id"]=$idFighterSelected;
    	$this->save($toolFound);
    	
        $fighterModel=new Fighter();
        $currentFighter = $fighterModel->find("first",array("conditions"=>array("Fighter.id"=>$idFighterSelected)))["Fighter"];
        $toolType=$toolFound["type"];
        $toolBonus=$toolFound["bonus"];

        if($toolType=="sightUp"){
            $currentFighter["skill_sight"]+=$toolBonus;

        }elseif($toolType=="strengthUp"){
            $currentFighter["skill_strength"]+=$toolBonus;

        }elseif($toolType=="healthUp"){
            $currentFighter["skill_health"]+=$toolBonus;
            $currentFighter["current_health"]=$currentFighter["skill_health"];

        }

        $fighterModel->save($currentFighter);
    }


    public function dropTool($toolToDrop){
        App::uses('CakeSession', 'Model/Datasource');
        $idFighterSelected=CakeSession::read('User.fighter')['id'];
    	$toolToDrop["fighter_id"]=null;
    	$this->save($toolToDrop);

    	
        $fighterModel=new Fighter();
        $currentFighter = $fighterModel->find("first",array("conditions"=>array("Fighter.id"=>$idFighterSelected)))["Fighter"];
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

    public function releaseItem($idFighter){
        $listTool=$this->find('all', array("conditions"=>array("fighter_id"=>$idFighter)));


        foreach($listTool as $values){
            $values['Tool']["fighter_id"]=NULL;
            $this->save($values);
        }
    }


}



?>