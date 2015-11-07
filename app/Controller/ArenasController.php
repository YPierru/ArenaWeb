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
     */
    public function login(){

    }

    /**
     * [sight description]
     * @return [type] [description]
     */
    public function sight(){
        //Move or Attack according to the form
        $idPlayer="545f827c-576c-4dc5-ab6d-27c33186dc3e";

    	if ($this->request->is('post')){
    		$key=key($this->request->data);

			if($key=="Fightermove"){
    			$this->Fighter->doMove(1, $this->request->data[$key]['direction']);

			}else if($key=="Fighterattack"){
				$this->Fighter->doAttack(1, $this->request->data[$key]['direction']);
			}
                
    	}

        $this->set("map",$this->createMap($idPlayer));
        $this->set("fighter",$this->Fighter->findById(1)["Fighter"]);
    }

    private function createMap($idPlayer){
        $myFighter=$this->Fighter->find('first', array("conditions"=>array("Fighter.Player_id"=>$idPlayer)))["Fighter"];
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
                $map[$tempX][$tempY]["tool"]= $Tool;
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
                $_SESSION["nameFighterSelected"]=$nameSelected;
                $this->set("currentFighter", $this->Fighter->find('first', array("conditions"=>array("Fighter.name"=>$nameSelected)))["Fighter"]);

    		}else if($key=="Fighterdetails"){
                $this->set('selection',true);
                $nameSelected = $names[$this->request->data[$key]["details_fighter"]];
                $this->set("selectedFighterData",$this->Fighter->find('first', array("conditions"=>array("Fighter.name"=>$nameSelected)))["Fighter"]);
                //$idSelected = $this->request->data[$key]["details_fighter"]+1;
            
            }else if($key=="Fightercreate"){
                $newFighterName=$this->request->data[$key]["name"];

                if(empty($newFighterName)){
                    debug("Your fighter must have a name");
                }
                elseif(in_array($newFighterName,$names)){
                    debug("Fighter ".$newFighterName." already exists.");
                }else{
                    $this->Fighter->createFighter($newFighterName);
                    $this->sendArrayNamesToView($idPlayer);
                }
                
            }else if($key=="lvlupform"){
                $upType=$this->request->data[$key]['type'];
                $this->Fighter->lvlUpFighter($upType);
            }
    	}

        if(!empty($_SESSION["nameFighterSelected"])){
            $fighterXP=$this->Fighter->find("first",array("conditions"=>array("Fighter.name"=>$_SESSION["nameFighterSelected"])))['Fighter']['xp'];
            if($fighterXP>3){
                $this->set('levelUpEnable',true);
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