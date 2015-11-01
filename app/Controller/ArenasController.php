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
                $this->set('selection',true);
    			$idSelected = $this->request->data[$key]["selected_fighter"]+1;
    			$this->set('selectedFighterData',$this->Fighter->findById($idSelected)["Fighter"]);
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