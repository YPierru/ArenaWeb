<?php

App::uses('AppModel', 'Model');

class Fighter extends AppModel {

    public $displayField = 'name';

    public $belongsTo = array(
        				'Player' => array(
            						'className' => 'Player',
            						'foreignKey' => 'player_id'
            						),
        				);



    public function doMove($fighterId, $direction){
    	$myFighter=$this->findById($fighterId);

    	$errorMessage="Arena limits reach";

    	if(strcmp($direction,"east")==0){
    		if($myFighter["Fighter"]["coordinate_x"]<15){
    			$myFighter["Fighter"]["coordinate_x"]++;
    		}else{
    			debug($errorMessage);
    		}

    	}else if(strcmp($direction,"west")==0){
    		if($myFighter["Fighter"]["coordinate_x"]>0){
    			$myFighter["Fighter"]["coordinate_x"]--;
    		}else{
    			debug($errorMessage);
    		}

    	}else if(strcmp($direction,"north")==0){
    		if($myFighter["Fighter"]["coordinate_y"]<10){
    			$myFighter["Fighter"]["coordinate_y"]++;
    		}else{
    			debug($errorMessage);
    		}

    	}else if(strcmp($direction,"south")==0){
    		if($myFighter["Fighter"]["coordinate_y"]>0){
    			$myFighter["Fighter"]["coordinate_y"]--;
    		}else{
    			debug($errorMessage);
    		}
    	}

    	$this->save($myFighter);

    	debug($this->findById($fighterId));
    }


    public function doAttack($fighterId, $direction){
    	$myFighter=$this->findById($fighterId)["Fighter"];
    	$cooX=$myFighter["coordinate_x"];
    	$cooY=$myFighter["coordinate_y"];

    	$errorMessage="Arena limits reach";

    	if(strcmp($direction,"east")==0){
    		if($cooX<15){

    			//debug($this->find('all'));
    			$cooXAtk=$cooX+1;
    			$findFighter=$this->find('first', array('conditions'=>array( "Fighter.coordinate_x"=>$cooXAtk,"Fighter.coordinate_y"=>$cooY)));
    			$this->attackProcess($findFighter,$myFighter);
    			

    		}else{
    			debug($errorMessage);
    		}

    		//debug($this->find('all'));


    	}else if(strcmp($direction,"west")==0){
    		if($cooX>0){

    			//debug($this->find('all'));
    			$cooXAtk=$cooX-1;
    			$findFighter=$this->find('first', array('conditions'=>array( "Fighter.coordinate_x"=>$cooXAtk,"Fighter.coordinate_y"=>$cooY)));
    			$this->attackProcess($findFighter,$myFighter);
    			

    		}else{
    			debug($errorMessage);
    		}

    	}else if(strcmp($direction,"north")==0){
    		if($cooY<15){

    			//debug($this->find('all'));
    			$cooYAtk=$cooY+1;
    			$findFighter=$this->find('first', array('conditions'=>array( "Fighter.coordinate_x"=>$cooX,"Fighter.coordinate_y"=>$cooYAtk)));
    			$this->attackProcess($findFighter,$myFighter);
    			

    		}else{
    			debug($errorMessage);
    		}

    	}else if(strcmp($direction,"south")==0){
    		if($cooY>0){

    			//debug($this->find('all'));
    			$cooYAtk=$cooY-1;
    			$findFighter=$this->find('first', array('conditions'=>array( "Fighter.coordinate_x"=>$cooX,"Fighter.coordinate_y"=>$cooYAtk)));
    			$this->attackProcess($findFighter,$myFighter);
    			

    		}else{
    			debug($errorMessage);
    		}
    	}

    }

    private function attackProcess($findFighter, $myFighter){
    	if(empty($findFighter)){
			debug("no fighter here");
		}else{
			debug("fighter found");
			$fighterDef=$findFighter["Fighter"];

			//$randVal=rand(1,20);
			$randVal=11;
			$fighterDefLvl=$fighterDef["level"];
			$fighterAtkLvl=$myFighter["level"];

			if($randVal>(10+($fighterDefLvl-$fighterAtkLvl))){
				$myFighter["xp"]++;
				$fighterDef["current_health"]-=$myFighter["skill_strength"];

				if($fighterDef["current_health"]<0){
					$fighterDef["current_health"]=0;
				}

				if($fighterDef["current_health"]<=0){
					$myFighter["xp"]+=$fighterDefLvl;

					/*while($myFighter["xp"]>=4){
						
						$myFighter["level"]++;
						$myFighter["xp"]-=4;
					}*/
				}
			}
		}

		$this->save($myFighter);
		$this->save($fighterDef);
    }


}

?>