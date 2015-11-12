<?php

App::uses('AppModel', 'Model');
App::uses('Tool', 'Model');

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
    public function doMove($direction){
        //Retrieve the fighter
        
        App::uses('CakeSession', 'Model/Datasource');
        $idFighterSelected=CakeSession::read('User.fighter');
        $myFighter=$this->findById($idFighterSelected);

        $errorMessage="";

        /**
         * Change coo of the fighter according to direction and arena limit
         */
        if(strcmp($direction,"east")==0){
          if($myFighter["Fighter"]["coordinate_x"]<14){
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
      if($myFighter["Fighter"]["coordinate_y"]<9){
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
    public function doAttack($direction){
        //Retrieve the fighter-
        App::uses('CakeSession', 'Model/Datasource');
        $idFighterSelected=CakeSession::read('User.fighter');
      $myFighter=$this->findById($idFighterSelected)["Fighter"];
      $cooX=$myFighter["coordinate_x"];
      $cooY=$myFighter["coordinate_y"];

      $errorMessage="";

        //Make the fighter attacks according to a direction
      if(strcmp($direction,"east")==0){
        if($cooX<14){

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
        if($cooY<9){

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
            $randVal=110;
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
                $this->save($fighterDef);
               if($fighterDef["current_health"]<=0){
                  debug("fighter def is dead");
                  $fighterDef["current_health"]=0;
                  $myFighter["xp"]+=$fighterDefLvl;
                  $toolModel=new Tool();
                  $toolModel->releaseItem($fighterDef["id"]);
                  $this->destroyFighter($fighterDef["id"]);
               }

            }else{
               debug("attack failed");
            }
        }

        $this->save($myFighter);
    }

    public function createFighter($newName, $idUser=null){
        if($idUser==null){
            App::uses('CakeSession', 'Model/Datasource');
            $idUser=CakeSession::read('User.player');
        }
        //debug($idUser);
        $newFighter=array(
            "name"=>$newName,
            "player_id"=>$idUser,
            "coordinate_x"=>rand(0,14),
            "coordinate_y"=>rand(0,9),
            "level"=>1,
            "xp"=>0,
            "skill_sight"=>2,
            "skill_strength"=>1,
            "skill_health"=>3,
            "current_health"=>3);

        $this->create($newFighter);
        $this->save();

    }
    
    public function destroyFighter($fighterId){
        $this->delete($fighterId, false);
    }

    public function lvlUpFighter($upType){
        App::uses('CakeSession', 'Model/Datasource');
        $idFighterSelected=CakeSession::read('User.fighter');
        $fighter=$this->find('first', array("conditions"=>array("Fighter.id"=>$idFighterSelected)))["Fighter"];
        //debug($fighter);

        if($upType=="uphealth"){
            $fighter["skill_health"]++;
        }elseif($upType=="upsight"){
            $fighter["skill_sight"]++;
        }elseif($upType=="upstrength"){
            $fighter["skill_strength"]++;
        }

        $fighter["current_health"]=$fighter["skill_health"];

        $fighter["xp"]=$fighter["xp"]-3;
        $fighter["level"]++;
        $this->save($fighter);
        //debug($this->find('first', array("conditions"=>array("Fighter.id"=>$_SESSION["idFighterSelected"])))["Fighter"]);
    }
}



?>