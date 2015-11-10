
                        
<section class="container-fluid" id="section10">
    <div class="col-sm-6 ">
        <?php echo $this->Html->link('Se connecter', array('controller' => 'Users', 'action' => 'login'), array( 'class' => 'btn btn-danger btn-lg center-block')); ?>
     </div>
    
    <div class="col-sm-6 ">
        <div class="users form">
            <?php
                echo $this->Flash->render('auth');
                echo $this->Form->create('User', array('action' => 'register'));?>
                <fieldset>
                        <legend><?php echo __('Inscription'); ?></legend>
                        <?php 
                        echo $this->Form->input('email');
                        echo $this->Form->input('password',array('type' => 'password'));
                        echo $this->Form->input('password_confirm',array('type' => 'password'));
                    ?>
                    </fieldset>
            <?php 
               echo $this->Form->end('Creer');
            ?>
        </div>
    </div>
</section>
