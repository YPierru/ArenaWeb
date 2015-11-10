<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// app/Model/Player.php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $useTable = 'players';

    
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
                $passwordHasher = new BlowfishPasswordHasher();
                $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
                );
            }
            /* if (isset($this->data[$this->alias]['id'])) {
                $passwordHasher1 = new BlowfishPasswordHasher();
                $this->data[$this->alias]['id'] = $passwordHasher1->hash(
                    $this->data[$this->alias]['id']
                );
            }*/
        
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
      
}