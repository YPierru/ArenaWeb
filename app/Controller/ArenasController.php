<?php 

App::uses('AppController', 'Controller');

/**
 * Main controller of our small application
 *
 * @author ...
 */
class ArenasController extends AppController
{

	public $uses = array('Player', 'Fighter', 'Event');
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
    	if ($this->request->is('post')){
    		$key=key($this->request->data);

			if($key=="Fightermove"){
    			$this->Fighter->doMove(1, $this->request->data[$key]['direction']);

			}else if($key=="Fighterattack"){
				$this->Fighter->doAttack(1, $this->request->data[$key]['direction']);
			}
                
    	}
        
        $this->set("fighter",$this->Fighter->findById(1)["Fighter"]);
    }

    /**
     * [fighter description]
     * @return [type] [description]
     */
    public function fighter(){
    	//First player
    	$idPlayer="545f827c-576c-4dc5-ab6d-27c33186dc3e";

        //retrieve all fighters for this player
    	$allFighterNames=$this->Fighter->find('all', array("conditions"=>array("Fighter.Player_id"=>$idPlayer),
    														"fields"   =>array("Fighter.name")));
    	//push the fighter's name in an array
    	foreach($allFighterNames as $fighter){
    		$names[]=$fighter["Fighter"]["name"];
    	}

        //send to view
    	$this->set('names',$names);

        //at first loading, a fighter is not selected
        $this->set('selection',false);
    	//$this->set('selectedFighterData',$this->Fighter->findById(1)["Fighter"]);


    	if($this->request->is("post")){

    		$key=key($this->request->data);
			//debug($key);

    		if($key=="Fighterselect"){
                //Send fighter data to the view
                $nameSelected = $names[$this->request->data[$key]["selected_fighter"]];
                $_SESSION["nameFighterSelected"]=$nameSelected;

    		}else if($key=="Fighterdetails"){
                $this->set('selection',true);
                $nameSelected = $names[$this->request->data[$key]["details_fighter"]];
                $this->set("selectedFighterData",$this->Fighter->find('first', array("conditions"=>array("Fighter.name"=>$nameSelected)))["Fighter"]);
                //$idSelected = $this->request->data[$key]["details_fighter"]+1;
            
            }else if($key=="Fightercreate"){
                $newFighterName=$this->request->data[$key]["name"];
                debug($newFighterName);
                if(in_array($newFighterName,$names)){
                    debug("Fighter ".$newFighterName." already exists.");
                }else{
                    $newFighter=array(
                        "name"=>$newFighterName,
                        "player_id"=>$idPlayer,
                        "coordinate_x"=>0,
                        "coordinate_y"=>0,
                        "level"=>3,
                        "xp"=>0,
                        "skill_sight"=>0,
                        "skill_strength"=>1,
                        "skill_health"=>3,
                        "current_health"=>3);

                    $this->Fighter->create($newFighter);
                    $this->Fighter->save();
                }
                
            }
    	}
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