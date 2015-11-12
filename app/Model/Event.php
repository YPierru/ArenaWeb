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
      $newEvent = array(
        "name" => $nameNewFighter." : ".$eventType.".",
        "date" => date("Y-m-d H:i:s"),
        "coordinate_x" => "0",
        "coordinate_y" => "0"
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