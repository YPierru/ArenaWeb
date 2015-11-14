<section class="container-fluid" id="section9">
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Connexion</a>
                            </div>
                            <div class="col-xs-6">
                                
                                                                <?php echo $this->Html->link('Inscription', array('controller' => 'Users', 'action' => 'register'), array( 'id'=>'register-form-link')); ?>
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
                                                                    echo $this->Form->create('User', array('action' => 'login'));?>
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
                                                                            echo('</div>');
                                                                        ?>
                                                                        </fieldset>
                                                               <div class="form-group">
                                                               <div class="row">
                                                                    <div class="col-sm-6 col-sm-offset-3">
                                                                     <?php 
                                                                        echo $this->Form->end(array('label'=>'Se connecter','class'=>"form-control btn btn-login"));
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