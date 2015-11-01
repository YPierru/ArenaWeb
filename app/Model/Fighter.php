<?php

App::uses('AppModel', 'Model');

class Fighter extends AppModel {
    public $displayField = 'name';
    public $belongsTo = array('Player' => array(
                                                'className' => 'Player',
                                                'foreignKey' => 'player_id'
                                                ),
                            );



    /**
     * Move a given fighter in a given direction
     */
    public function doMove($fighterId, $direction){
        //Retrieve the fighter
    	$myFighter=$this->findById($fighterId);

    	$errorMessage="";

        /**
         * Change coo of the fighter according to direction and arena limit
         */
    	if(strcmp($direction,"east")==0){
    		if($myFighter["Fighter"]["coordinate_x"]<15){
    			$myFighter["Fighter"]["coordinate_x"]++;
    		}else{
    			$errorMessage+="Arena limits reach\n";
    		}

    	}else if(strcmp($direction,"west")==0){
    		if($myFighter["Fighter"]["coordinate_x"]>0){
    			$myFighter["Fighter"]["coordinate_x"]--;
    		}else{
    			$errorMessage+="Arena limits reach\n";
    		}

    	}else if(strcmp($direction,"north")==0){
    		if($myFighter["Fighter"]["coordinate_y"]<10){
    			$myFighter["Fighter"]["coordinate_y"]++;
    		}else{
    			$errorMessage+="Arena limits reach\n";
    		}

    	}else if(strcmp($direction,"south")==0){
    		if($myFighter["Fighter"]["coordinate_y"]>0){
    			$myFighter["Fighter"]["coordinate_y"]--;
    		}else{
    			$errorMessage+="Arena limits reach\n";
    		}
    	}else{
            $errorMessage+="Invalid direction\n";
        }

        if(!empty($errorMessage)){
            debug($errorMessage);
        }

    	$this->save($myFighter);

    	//debug($this->findById($fighterId));
    }
    /**
     * Make a given fighter attack in a given direction
     */
    public function doAttack($fighterId, $direction){
        //Retrieve the fighter
    	$myFighter=$this->findById($fighterId)["Fighter"];
    	$cooX=$myFighter["coordinate_x"];
    	$cooY=$myFighter["coordinate_y"];

    	$errorMessage="";

        //Make the fighter attacks according to a direction
    	if(strcmp($direction,"east")==0){
    		if($cooX<15){

    			//debug($this->find('all'));
                //X coo of the attack
    			$cooXAtk=$cooX+1;

                //find if there's a fighter on the attack coo
    			$findFighter=$this->find('first', array('conditions'=>array( "Fighter.coordinate_x"=>$cooXAtk,"Fighter.coordinate_y"=>$cooY)));

                //start the attack algorithm
    			$this->attackProcess($findFighter,$myFighter);
    			

    		}else{
    			$errorMessage+="Arena limits reach\n";
    		}

    		//debug($this->find('all'));


    	}else if(strcmp($direction,"west")==0){
    		if($cooX>0){

    			//debug($this->find('all'));
    			$cooXAtk=$cooX-1;
    			$findFighter=$this->find('first', array('conditions'=>array( "Fighter.coordinate_x"=>$cooXAtk,"Fighter.coordinate_y"=>$cooY)));
    			$this->attackProcess($findFighter,$myFighter);
    			

    		}else{
    			$errorMessage+="Arena limits reach\n";
    		}

    	}else if(strcmp($direction,"north")==0){
    		if($cooY<15){

    			//debug($this->find('all'));
    			$cooYAtk=$cooY+1;
    			$findFighter=$this->find('first', array('conditions'=>array( "Fighter.coordinate_x"=>$cooX,"Fighter.coordinate_y"=>$cooYAtk)));
    			$this->attackProcess($findFighter,$myFighter);
    			

    		}else{
    			$errorMessage+="Arena limits reach\n";
    		}

    	}else if(strcmp($direction,"south")==0){
    		if($cooY>0){

    			//debug($this->find('all'));
    			$cooYAtk=$cooY-1;
    			$findFighter=$this->find('first', array('conditions'=>array( "Fighter.coordinate_x"=>$cooX,"Fighter.coordinate_y"=>$cooYAtk)));
    			$this->attackProcess($findFighter,$myFighter);
    			

    		}else{
    			$errorMessage+="Arena limits reach\n";
    		}
    	}else{
            $errorMessage+="Invalid direction\n";
        }

        if(!empty($errorMessage)){
            debug($errorMessage);
        }

    }

    private function attackProcess($findFighter, $myFighter){

        //Check if there's a fighter in the attack coo
    	if(empty($findFighter)){
			debug("no fighter here");
		}else{
			debug("fighter found");

            //Get the fighter attacked
			$fighterDef=$findFighter["Fighter"];

			//$randVal=rand(1,20);
			$randVal=11;
			$fighterDefLvl=$fighterDef["level"];
			$fighterAtkLvl=$myFighter["level"];

            //Check if attack successed
			if($randVal>(10+($fighterDefLvl-$fighterAtkLvl))){
                debug("attack successed");

                //change XP of the attacker and health of the attacked
				$myFighter["xp"]++;
				$fighterDef["current_health"]-=$myFighter["skill_strength"];

                //Reset attacked fighter health if negative/zero
                //up XP of the attacker
				if($fighterDef["current_health"]<=0){
					$fighterDef["current_health"]=0;
                    $myFighter["xp"]+=$fighterDefLvl;

                    /*while($myFighter["xp"]>=4){
                        
                        $myFighter["level"]++;
                        $myFighter["xp"]-=4;
                    }*/
				}
			}else{
                debug("attack failed");
            }
		}

		$this->save($myFighter);
		$this->save($fighterDef);
    }

    /**
     * Create a map given the attributes of the fighter
     */
    public function fView($fighterID){
        
    }
}

?>