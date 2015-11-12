<?php

App::uses('AppModel', 'Model');
App::uses('Fighter', 'Model');


class Event extends AppModel {


  public function addEvent($eventType,$nameNewFighter=null){
    App::uses('CakeSession', 'Model/Datasource');
    $idFighter=CakeSession::read('User.fighter');
    $fighterModel = new Fighter();
    $fighter=$fighterModel->findById($idFighter)["Fighter"];

    if($eventType=="creation"){
      $cooX=$fighterModel->find('first', array("conditions"=>array("Fighter.name"=>$nameNewFighter)))["Fighter"]["coordinate_x"];
      $cooY=$fighterModel->find('first', array("conditions"=>array("Fighter.name"=>$nameNewFighter)))["Fighter"]["coordinate_y"];
      
      $newEvent = array(
        "name" => $nameNewFighter." : ".$eventType.".",
        "date" => date("Y-m-d H:i:s"),
        "coordinate_x" => $cooX,
        "coordinate_y" => $cooY
      );
    }else{
      $newEvent = array(
        "name" => $fighter["name"]." : ".$eventType.".",
        "date" => date("Y-m-d H:i:s"),
        "coordinate_x" => $fighter["coordinate_x"],
        "coordinate_y" => $fighter["coordinate_y"]
      );
    }

    $this->create($newEvent);
    $this->save();
  }

}



?>