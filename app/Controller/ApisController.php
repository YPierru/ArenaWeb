<?php 

App::uses('AppController', 'Controller');

/**
 * Main controller of our small application
 *
 * @author ...
 */
class ApisController extends AppController
{

    public $uses = array('Player', 'Fighter', 'Event');

    /**
     * index method : first page
     *
     * @return void
     */
    public function fighterview($id){
        $this->layout="ajax";
        $this->set('datas', $this->Fighter->find('all'));
    }


}
?>