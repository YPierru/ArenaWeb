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
    	if ($this->request->is('post')){
    		$key=key($this->request->data);

			if($key=="Fightermove"){
    			$this->Fighter->doMove(1, $this->request->data[$key]['direction']);
			}else if($key=="Fighterattack"){
				$this->Fighter->doAttack(1, $this->request->data[$key]['direction']);
			}

    	}
    }

    /**
     * [fighter description]
     * @return [type] [description]
     */
    public function fighter(){
    	//First player
    	$idPlayer="545f827c-576c-4dc5-ab6d-27c33186dc3e";
    	$allFighterNames=$this->Fighter->find('all', array("conditions"=>array("Fighter.Player_id"=>$idPlayer),
    														"fields"   =>array("Fighter.name")));
    	
    	foreach($allFighterNames as $fighter){
    		$names[]=$fighter["Fighter"]["name"];
    	}

    	$this->set('names',$names);
    	$this->set('selectedFighterData',$this->Fighter->findById(1)["Fighter"]);


    	if($this->request->is("post")){
    		$key=key($this->request->data);
			debug($key);
    		if($key=="Fighterselect"){
    			$idSelected = $this->request->data[$key]["selected_fighter"]+1;
    			$this->set('selectedFighterData',$this->Fighter->findById($idSelected)["Fighter"]);
    		}else if($key=="Fightercreate"){
    			debug("creating a new fighter");
    		}
    	}
    }

    /**
     * [diary description]
     * @return [type] [description]
     */
    public function diary(){
    	$this->set('raw',$this->Event->find());
    }


}
?>