<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// app/Model/Player.php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Player extends AppModel {
    public $name = 'Player';
    public $validate = array(
        'id' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un nom d\'utilisateur est requis'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Merci de rentrer un email valide'
            )
        ),
         'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un mot de passe est requis'
            )
        )
    );
     
    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new SimplePasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}
    
        public function createPlayer($newID,$newEmail,$newPassWord){
        //$_SESSION["id_player"]->use this instead of id hardcode
        //$this->Flash->success(__('Start creat'));
            $newPlayer=array(
            "id"=>$newID,
            "email"=>$newEmail,
            "password"=>$newPassWord
            );

        $this->create($newPlayer);
        
        if ($this->save()) {
            debug('L\'user a été sauvegardé');
            //$this->Flash->success(__('L\'user a été sauvegardé'));
        } else {
            debug('L\'user n\'a pas été sauvegardé. Merci de réessayer.');
           // $this->Flash->error(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
        }

    }
    
    
        public function connect($actualEmail,$actualPassWord) {
            
           
        $passwordHasher = new SimplePasswordHasher();
        $actualPassWord2 = $passwordHasher->hash($actualPassWord);
        
        $findFighter=$this->find('first', array('conditions'=>array( "email"=>$actualEmail,"password"=>$actualPassWord2)));
        if(empty($findFighter)){
            debug("Connexion échoué.");
          }else{
              
               $this->request->data['Player'] = array_merge(
                    $this->request->data['Player'],
                    array('id' => $findFighter["id"])
                );
               unset($this->request->data['Player']['password']);
                $this->Auth->login($this->request->data['Player']);
                
             //$this->Auth->login($findFighter["id"]);
          }

            /*
            if ($this->Player->save($this->request->data)) {
                $id = $this->Player->id;
                $this->request->data['Player'] = array_merge(
                    $this->request->data['Player'],
                    array('id' => $id)
                );
                unset($this->request->data['Player']['password']);
                $this->Auth->login($this->request->data['Player']);
                //return $this->redirect('/users/home');
            }
             * */
             
        }
}