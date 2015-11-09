<?php 

App::uses('AppController', 'Controller');

/**
 * Main controller of our small application
 *
 * @author ...
 */
class ArenasController extends AppController
{

	public $uses = array('Player', 'Fighter', 'Event','Tool');
    public $helpers = array('Js' => array('Jquery'));

    /**
     * index method : first page
     *
     * @return void
     */
    public function index(){
        $this->set('myname', "92i kcdq");
    }

    /**
     * [login description]
     * @return [type] [description]
     * 
     *  $this->Auth->user('nom_du_champ')
     */
    public function login(){
        
    }

    /**
     * [sight description]
     * @return [type] [description]
     */
    public function sight(){
        //Move or Attack according to the form
        $_SESSION["idFighterSelected"]=1;

    	if ($this->request->is('post')){
    		$key=key($this->request->data);

			if($key=="Fightermove"){
    			$this->Fighter->doMove($this->request->data[$key]['direction']);

			}else if($key=="Fighterattack"){
				$this->Fighter->doAttack($this->request->data[$key]['direction']);
			}else if($key=="lvlupform"){
                $upType=$this->request->data[$key]['type'];
                $this->Fighter->lvlUpFighter($upType);
            }else if(1=="pickStuff"){
                $listTools=$this->Tool->find('all', array("conditions"=>array("Tool.fighter_id"=>$_SESSION["idFighterSelected"])));
               
                //debug("\n\n\n\n\n\n\n\n\n\n");
                //debug($listTools);
                //debug($toolFound);
                $typeToolFound=$toolFound["type"];
                foreach ($listTools as $value) {
                    if($typeToolFound==$value["Tool"]["type"]){
                        $this->Tool->dropTool($value["Tool"]);
                    }
                }
                $this->Tool->giveToFighter($toolFound);
               
            }
                
    	}

        $toolFound=$this->isFighterOnTool();
        if(!empty($toolFound)){
            $this->set("tool",$toolFound);
        }

        
        if(!empty($_SESSION["idFighterSelected"])){
            $fighterXP=$this->Fighter->find("first",array("conditions"=>array("Fighter.id"=>$_SESSION["idFighterSelected"])))['Fighter']['xp'];
            if($fighterXP>3){
                $this->set('levelUpEnable',true);
            }
        }

        $this->set("map",$this->createMap());
        $this->set("fighter",$this->Fighter->findById($_SESSION["idFighterSelected"])["Fighter"]);
    }

    private function isFighterOnTool(){
        $cooX=$this->Fighter->find('first', array("conditions"=>array("Fighter.id"=>$_SESSION["idFighterSelected"])))["Fighter"]["coordinate_x"];
        $cooY=$this->Fighter->find('first', array("conditions"=>array("Fighter.id"=>$_SESSION["idFighterSelected"])))["Fighter"]["coordinate_y"];

        $tool=$this->Tool->find('first', array("conditions"=>array("Tool.coordinate_x"=>$cooX,"Tool.coordinate_y"=>$cooY,"Tool.fighter_id"=>null)))["Tool"];

        return $tool;
    }

    private function createMap(){
        $_SESSION["idFighterSelected"]=1;
        $myFighter=$this->Fighter->find('first', array("conditions"=>array("Fighter.id"=>$_SESSION["idFighterSelected"])))["Fighter"];
        $view=$myFighter["skill_sight"];
        $cooX=$myFighter["coordinate_x"];
        $cooY=$myFighter["coordinate_y"];
        $map=[];
        $listFighter = $this->Fighter->find("all");
        $listTool = $this->Tool->find("all");

        foreach($listFighter as $fighter){
            $tempX=$fighter["Fighter"]["coordinate_x"];
            $tempY=$fighter["Fighter"]["coordinate_y"];
            if( $tempX > $cooX - $view && $tempX < $cooX+$view && $tempY > $cooY - $view && $tempY < $cooY + $view){
                $map[$tempX][$tempY]["fighter"]= $fighter;
            }
        }
        foreach($listTool as $Tool){
            $tempX=$Tool["Tool"]["coordinate_x"];
            $tempY=$Tool["Tool"]["coordinate_y"];
            if( $tempX > $cooX - $view && $tempX < $cooX+$view && $tempY > $cooY - $view && $tempY < $cooY + $view){
                if($Tool["Tool"]["fighter_id"]==null){
                    $map[$tempX][$tempY]["tool"]= $Tool;
                }
            }           
        }

        return $map;
    }

    /**
     * [fighter description]
     * @return [type] [description]
     */
    public function fighter(){
        session_start();
    	//First player
    	$idPlayer="545f827c-576c-4dc5-ab6d-27c33186dc3e";

        $names=$this->sendArrayNamesToView($idPlayer);

    	if($this->request->is("post")){

    		$key=key($this->request->data);
			//debug($key);

    		if($key=="Fighterselect"){
                //Send fighter data to the view
                $nameSelected = $names[$this->request->data[$key]["selected_fighter"]];
                $_SESSION["idFighterSelected"]=$this->Fighter->find('first', array("conditions"=>array("Fighter.name"=>$nameSelected),"fields"=>array("Fighter.id")))["Fighter"];
                $this->set("currentFighter", $this->Fighter->find('first', array("conditions"=>array("Fighter.id"=>$_SESSION["idFighterSelected"])))["Fighter"]);

    		}else if($key=="Fighterdetails"){
                $this->set('selection',true);
                $nameSelected = $names[$this->request->data[$key]["details_fighter"]];
                $this->set("selectedFighterData",$this->Fighter->find('first', array("conditions"=>array("Fighter.name"=>$nameSelected)))["Fighter"]);
                $idFighterDetails = $this->Fighter->find('first', array("conditions"=>array("Fighter.name"=>$nameSelected),"fields"=>array("Fighter.id")))["Fighter"];
                $this->set("actualStuff", $this->Tool->find('all', array("conditions"=>array("Tool.fighter_id"=>$idFighterDetails))));
            
            }else if($key=="Fightercreate"){
                $newFighterName=$this->request->data[$key]["name"];

                if(empty($newFighterName)){
                    debug("Your fighter must have a name");
                }
                elseif(in_array($newFighterName,$names)){
                    debug("Fighter ".$newFighterName." already exists.");
                }else{
                    $this->Fighter->createFighter($newFighterName);
                    $names=$this->sendArrayNamesToView($idPlayer);
                }
                
            }
    	}
    }



    private function sendArrayNamesToView($idPlayer){
        if(isset($names)){
            unset($names);
        }

        $allFighterNames=$this->Fighter->find('all', array("conditions"=>array("Fighter.Player_id"=>$idPlayer),
                                                                        "fields"   =>array("Fighter.name")));
        //push the fighter's name in an array
        foreach($allFighterNames as $fighter){
            $names[]=$fighter["Fighter"]["name"];
        }

        //send to view
        $this->set('names',$names);
        return $names;
    }
    
    /**
     * [diary description]
     * @return [type] [description]
     */
    public function diary(){

        $yesterday=date("Y-m-d H:i:s",mktime(date("H"),date("i"),date("s"),date("m"),date("d")-1,date("Y")));

    	$this->set('raw',$this->Event->find('all', array("conditions"=>array("Event.date >= " => $yesterday))));
    }


}
?>