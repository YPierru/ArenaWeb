<section class="container-fluid" id="section9">
    
    <div class="col-sm-6 ">
        <div class="users form">
            <?php
                echo $this->Flash->render('auth');
                echo $this->Form->create('User', array('action' => 'login'));?>
                <fieldset>
                        <legend><?php echo __('Connexion'); ?></legend>
                        <?php 
                        echo $this->Form->input('email');
                        echo $this->Form->input('password');
                    ?>
                    </fieldset>
            <?php 
               echo $this->Form->end('Login');
            ?>
        </div>
    </div>
    
    <div class="col-sm-6 ">
        <?php echo $this->Html->link('S\'inscrire', array('controller' => 'Users', 'action' => 'register'), array( 'class' => 'btn btn-warning btn-lg center-block')); ?>
     </div>
    
    
    
</section>



  