<?php 

App::uses('AppController', 'Controller');

/**
 * Main controller of our small application
 *
 * @author ...
 */
class ApisController extends AppController
{

    public $uses = array('Fighter');

    public function fighterview($id){
        $this->layout="ajax";
        $this->set('datas', $this->Fighter->findById($id));
    }

    public function fighterdomove($id,$dir){
        $this->layout="ajax";
        $this->Fighter->doMove($id, $dir);
        $this->set('datas', $this->Fighter->findById($id));
    }

    public function fighterdoattack($id,$dir){
        $this->layout="ajax";
        $this->Fighter->doAttack($id, $dir);
        $this->set('datas', $this->Fighter->findById($id));
    }


}
?>