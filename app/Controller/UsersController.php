<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersController extends AppController {

    var $name = 'Users';
    public $uses = array('Fighter','User');
   // var $components = array('Auth'); // Pas nécessaire si déclaré dans votre contrôleur app

    /**
    * Le Composant Auth fournit la fonctionnalité nécessaire
    * pour le login, donc vous pouvez laisser cette fonction vide.
    */
    public function login() {
                    
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {

                $id = $this->Auth->user('id');
                

                $compte = array('User' =>
                    array('player' => $id ,'fighter'=> null)
                 );
                $this->Session->write($compte);
              return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__("Nom d'user ou mot de passe invalide, réessayer"));
            }    
        
        }
        
    }
    
    function logout() {
        $this->redirect($this->Auth->logout());
    }
    
    
     public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            debug("test");
            if ($this->User->save($this->request->data)) {
                $this->Auth->login();
                $this->Flash->success(__('L\'user a été sauvegardé'));
                $id = $this->Auth->user('id');
                $this->Fighter->createFighter('myFirstFighter',$id);
                $fi = $this->Fighter->find("first",array("conditions"=>array("Fighter.player_id" => $id)))["Fighter"]['id'];
                $compte = array('User' =>
                    array('player' => $id ,'fighter'=> $fi)
                 );
                $this->Session->write($compte);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User Invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }
    
}