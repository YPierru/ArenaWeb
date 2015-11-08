<section class="container-fluid" id="section4">
<div  class="row">
    <!-- app/View/Users/add.ctp -->
    <div class="users form">
    <?php echo $this->Form->create('AddPlayer');?>
        <fieldset>
            <legend><?php echo __('Inscrition'); ?></legend>
            <?php 
            echo $this->Form->input('email');
            echo $this->Form->input('password');
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Ajouter'));?>
    </div>
    
</div>
    
    <div  class="row">
    <!-- app/View/Users/add.ctp -->
    <div class="users form">
    <?php echo $this->Form->create('ConnectPlayer');?>
        <fieldset>
            <legend><?php echo __('Connection'); ?></legend>
            <?php 
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            
           
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Connection'));?>
    </div>
    
</div>
</section>



















<!--
<section id="section4">
    <div class="container v-center">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Identification</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                        <div class="row form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Login" required="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="middleName" name="firstName" placeholder="Mot de Passe" required="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="row form-group">
                                <div class="col-sm-5">
                                    <button class="btn btn-default btn-lg pull-right">Connection</button>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="col-sm-7 pull-right">
                            <div class="row form-group">
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Mot de Passe" required="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="middleName" name="firstName" placeholder="Confirmer le mot de Passe" required="">
                                </div>
                            </div>
                             <div class="row form-group">
                                 <div class="row form-group">
                                    <div class="col-sm-5">
                                        <button class="btn btn-default btn-lg pull-right">Inscription</button>
                                    </div>
                                </div>
                             </div>   
              </div>
                        
            
        </div>
    </div>
</section>
-->