<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersController extends AppController {

    var $name = 'Users';
   // var $components = array('Auth'); // Pas nécessaire si déclaré dans votre contrôleur app

    /**
    * Le Composant Auth fournit la fonctionnalité nécessaire
    * pour le login, donc vous pouvez laisser cette fonction vide.
    */
    public function login() {
                    if ($this->request->is('post')) {
                        //we need to change the request->data indexes to make everything work
                        if (isset($this->request->data['Login'] /*that's the name we gave to the form*/)) {
                            $this->request->data['User'] = $this->request->data['Login'];
                            unset($this->request->data['Login']); //clean everything up so all work as it is working now
                            $this->set('formName', 'Login'); //we need to pass a reference to the view for validation display
                        } //if there's no 'Login' index, we can assume the request came the normal way
                    }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
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
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
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
    
    /*
    public function createPlayer(){
        
        $newEmail = $this->request->data[$key]["email_:"];
        $newPassWord = $this->request->data[$key]["password_:"];
                    if(empty($newEmail) || empty($newPassWord)){
                      debug("Les champs doivent être remplis.");
                    }else{
                        $newID = $this->Player->find('count');
                        $newID = $newID + 1;
                       // $this->User->createPlayer($total,$newEmail,$newPassWord);
                        
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
        
      
    }*/
    
}