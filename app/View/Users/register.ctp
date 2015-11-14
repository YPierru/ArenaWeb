<section class="container-fluid" id="section9">
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                                                <?php echo $this->Html->link('Connexion', array('controller' => 'Users', 'action' => 'login'), array( 'id'=>'login-form-link')); ?>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" class="active" id="register-form-link">Inscription</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                                           
                                                            
                                                            
                                                           <div class="users form" id="login-form" action="http://phpoll.com/login/process" method="post" role="form" style="display: block;">
                                                                <?php
                                                                    echo $this->Flash->render('auth');
                                                                    echo $this->Form->create('User', array('action' => 'register'));?>
                                                                    <fieldset>
                                                                            
                                                                            <?php
                                                                            if(isset($message)){
                                                                                echo('<div class="form-group">');
                                                                                echo($message);
                                                                                echo('</div>');
                                                                            }
                                                                            
                                                                            echo('<div class="form-group">');
                                                                            echo $this->Form->input('email',array('label' => '','id'=>'username','class'=>'form-control','placeholder'=>'Email','value'=>''));
                                                                            echo('</div><div class="form-group">');
                                                                            echo $this->Form->input('password',array('label' => '','id'=>'username','class'=>'form-control','placeholder'=>'Mot de passe','value'=>''));
                                                                            echo('</div><div class="form-group">');
                                                                            echo $this->Form->input('password_confirm',array('label' => '','type' => 'password','id'=>'username','class'=>'form-control','placeholder'=>'Confirmer le mot de passe','value'=>''));
                                                                            echo('</div>');
                                                                        ?>
                                                                        </fieldset>
                                                               <div class="form-group">
                                                               <div class="row">
                                                                    <div class="col-sm-6 col-sm-offset-3">
                                                                     <?php 
                                                                        echo $this->Form->end(array('label'=>'S\'inscrire','class'=>"form-control btn btn-register"));
                                                                     ?>
                                                                    </div>
                                                               </div>
                                                               </div>
                                                     
                                                               
                                                            </div>
                                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>