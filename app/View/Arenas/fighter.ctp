<section class="container-fluid" id="section4">
    <div  class="row">
            <div class="col-sm-6 ">
               
                <?php echo $this->Form->create('Fighterselect', array(
                       'inputDefaults' => array(
                            'div' => 'form-group',
                            'wrapInput' => false,
                            'class' => 'form-control'
                    ),
                    'class' => 'well'
                    )); 
                ?>

                    <legend>Selection</legend>

                     <?php 
                    echo $this->Form->input('selected_fighter', array(
                        'options' => $names
                    ));
                    ?>

                 <?php echo $this->Form->end(array('label' => 'Select', 'class' => 'btn btn-info')); ?>
                    
                    
                    
                  <?php 
                    if($this->Session->read("User.fighter")!=null){
                        if(isset($currentFighter) && isset($actualStuff)){   
                        ?>
                            
				<legend>
						   <?php echo($currentFighter["name"]);?>
						Lvl. <?php echo($currentFighter["level"]);?>
                                                </legend>
						   
						<div class="row">
							<div class="media-left">
							<?php echo $this->Html->image('XP.png');?>
							</div>
							 <div class="media-body media-middle">
								<?php 
								echo($currentFighter["xp"]);
								?>
								/25
								
								<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo($currentFighter["xp"]);?>" aria-valuemin="0" aria-valuemax="25" style="width: <?php echo($currentFighter["xp"]*100/25);?>%;">
								   <?php 
								echo($currentFighter["xp"]);
								echo("/25");
								?>  
								</div>
							</div>
							</div>
						</div>
						<div class="row">
							<div class="media-left">
								<?php echo $this->Html->image('sight.png');?>
							</div>
							 <div class="media-body media-middle">
								<?php
									for ($i = 1; $i <= $currentFighter["skill_sight"]; $i++) {
										echo $this->Html->image('icoSight.png');
									}
								?>
							 </div>
						</div>
						<div class="row">
							<div class="media-left">
								 <?php echo $this->Html->image('strength.png');?>
							  
							</div>
							<div class="media-body media-middle">
								
								<?php
									for ($i = 1; $i <= $currentFighter["skill_strength"]; $i++) {
										echo $this->Html->image('icoStrength.png');
									}
								?>
							</div>
						</div>
						<div class="row">
							<div class="media-left">
								<?php echo $this->Html->image('hearth.png');?>
							</div>
							<div class="media-body media-middle">
							   
							<div class="progress">
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo($currentFighter["current_health"]);?>" aria-valuemin="0" aria-valuemax="<?php echo($currentFighter["skill_health"]);?>" style="width: <?php echo($currentFighter["current_health"]*100/$currentFighter["skill_health"]);?>%;">
								   <?php 
								echo($currentFighter["current_health"]);
								echo("/");
								echo($currentFighter["skill_health"]);
								?>
								</div>
							</div>
								
							</div>
						</div>
                          
                    
                    <?php
                    	pr($actualStuff);
				

                            }
                    }else{
                            echo "No fighter selected";
                    }
                ?>
               
            </div>
           

            <div class="col-sm-6 ">

               <?php echo $this->Form->create('Fighterdetails', array(
                          'inputDefaults' => array(
                               'div' => 'form-group',
                               'wrapInput' => false,
                               'class' => 'form-control'
                       ),
                       'class' => 'well'
               )); 
           ?>
              <legend>Detail</legend> 

           <?php  
               echo $this->Form->input('details_fighter', array(
                 'options' => $names
             ));


             echo $this->Form->end(array('label' => 'Show details', 'class' => 'btn btn-info'));
           ?> 

            
                
				<?php if(isset($selectedFighterData) && isset($actualStuffDetails)){?>
				<legend>
						   <?php echo($selectedFighterData["name"]);?>
						Lvl. <?php echo($selectedFighterData["level"]);?>
                                                </legend>
						<div class="row">
							<div class="media-left">
							<?php echo $this->Html->image('XP.png');?>
							</div>
							 <div class="media-body media-middle">
								<?php 
								echo($selectedFighterData["xp"]);
								?>
								/25
								
								<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo($selectedFighterData["xp"]);?>" aria-valuemin="0" aria-valuemax="25" style="width: <?php echo($selectedFighterData["xp"]*100/25);?>%;">
								   <?php 
								echo($selectedFighterData["xp"]);
								echo("/25");
								?>  
								</div>
							</div>
							</div>
						</div>
						<div class="row">
							<div class="media-left">
								<?php echo $this->Html->image('sight.png');?>
							</div>
							 <div class="media-body media-middle">
								<?php
									for ($i = 1; $i <= $selectedFighterData["skill_sight"]; $i++) {
										echo $this->Html->image('icoSight.png');
									}
								?>
							 </div>
						</div>
						<div class="row">
							<div class="media-left">
								 <?php echo $this->Html->image('strength.png');?>
							  
							</div>
							<div class="media-body media-middle">
								
								<?php
									for ($i = 1; $i <= $selectedFighterData["skill_strength"]; $i++) {
										echo $this->Html->image('icoStrength.png');
									}
								?>
							</div>
						</div>
						<div class="row">
							<div class="media-left">
								<?php echo $this->Html->image('hearth.png');?>
							</div>
							<div class="media-body media-middle">
							   
							<div class="progress">
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo($selectedFighterData["current_health"]);?>" aria-valuemin="0" aria-valuemax="<?php echo($selectedFighterData["skill_health"]);?>" style="width: <?php echo($selectedFighterData["current_health"]*100/$selectedFighterData["skill_health"]);?>%;">
								   <?php 
								echo($selectedFighterData["current_health"]);
								echo("/");
								echo($selectedFighterData["skill_health"]);
								?>
								</div>
							</div>
								
							</div>
						</div>
						
                <?php
						pr($actualStuffDetails);
				
				}
                ?>
                
            </div>
    </div>
    
    </div>
</section>




<section class="container-fluid" id="section7">
    <?php echo $this->Form->create('Fightercreate', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
			),
		'class' => 'well'
		)); 
	?>

            <!--echo $this->Form->text('name');-->
            <legend>Nouveau</legend>
            <div class="input-group">
    <?php
	echo $this->Form->text('name',array('placeholder' => 'pseudo...','class' => 'form-control'));
	?>
    <?php echo $this->Form->end(array('label' => 'Create', 'class' => 'btn btn-info')); ?>
 </div>
</section>




