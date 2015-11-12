<?php $this->assign('title', 'Sight');?>
<!--<?php echo $this->Html->image('1.jpg', array('style' => 'width:100px;', 'class' => 'img-circle img-responsive img-thumbnail'));?>-->
<section class="container-fluid" id="section8">
    
    <?php 
    	if($fighterIsSelected){
    ?>
    <div class="row">
            <div class="col-sm-8 ">
				<div class="row">
					<div class="col-sm-10 col-md-offset-1">
						<?php
                                                //debug($fighter);
						echo('[');
						 echo($fighter['coordinate_x']+1);
						 echo(':');
						echo($fighter['coordinate_y']+1);
						echo(']');
						
						for ($i = 9; $i >= 0; $i--) {
							echo("<div class=\"row\">");
							
							for ($j = 0; $j <= 14; $j++) {

								if($j == $fighter['coordinate_x'] && $i == $fighter['coordinate_y']){
									echo $this->Html->image('fighter.png');
								}elseif(isset($map[$j][$i]['fighter']['Fighter']['name'])){
									echo $this->Html->image('autre.png');
								}elseif(isset($map[$j][$i]['tool']['Tool']['id'])){
									echo $this->Html->image('tool.png');
								}else{
									echo $this->Html->image('case.png');
								}
							}
							echo("</div>");
						}
						?>
					</div>
				</div>
			
				<div class="row">	
						<div class="col-sm-6 ">
							<?php echo $this->Form->create('Fightermove', array(
							'inputDefaults' => array(
							'div' => 'form-group',
							'wrapInput' => false,
							'class' => 'form-control'
							),
							'class' => 'well'
							)); 
							?>
								<legend>Bouge ton guerrier</legend>
								<?php 
									echo $this->Form->input('direction',
									array('options' => array('north'=>'north','south'=>'south','east'=>'east','west'=>'west'),
										  'default' => 'east'));
								?>
							<?php echo $this->Form->end(array('label' => 'Move', 'class' => 'btn btn-info')); ?>
						</div>
						<div class="col-sm-6 ">
							
							<?php echo $this->Form->create('Fighterattack', array(
							'inputDefaults' => array(
							'div' => 'form-group',
							'wrapInput' => false,
							'class' => 'form-control'
							),
							'class' => 'well'
							)); 
							?>
							
								<legend>Attaque une position</legend>
								 <?php 
									echo $this->Form->input('direction',
									array('options' => array('north'=>'north','south'=>'south','east'=>'east','west'=>'west'),
									'default' => 'east'));
								?>
							<?php echo $this->Form->end(array('label' => 'Attack', 'class' => 'btn btn-info')); ?>
							
							
							<?php
								if(isset($tool) && !empty($tool)){
									echo $this->Form->create('pickStuff', array(
									'inputDefaults' => array(
									'div' => 'form-group',
									'wrapInput' => false,
									'class' => 'form-control'
									),
									'class' => 'well'
									));
									echo "<legend>Ramassez un objet</legend>";
									echo "Vous êtes sur l'objet suivant : ";
									pr($tool);
									echo $this->Form->hidden('id');
									echo $this->Form->end(array('label' => 'Pickup de balzen', 'class' => 'btn btn-info'));
								}
							?>
					
						</div>
				</div>
            </div>    
            <div class="col-sm-4 ">
                <legend>
                    <?php echo($fighter["name"]);?>
                 Lvl. <?php echo($fighter["level"]);?>
                 </legend>
            
			<div class="row">
				<div class="media-left">
					<?php echo $this->Html->image('XP.png');?>
				</div>
				<div class="media-body media-middle">
					<?php echo($fighter["xp"]);?>/25

					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo($fighter["xp"]);?>" aria-valuemin="0" aria-valuemax="25" style="width: <?php echo($fighter["xp"]*100/25);?>%;">
							<?php 
							echo($fighter["xp"]);
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
					for ($i = 1; $i <= $fighter["skill_sight"]; $i++) {
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
					for ($i = 1; $i <= $fighter["skill_strength"]; $i++) {
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
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo($fighter["current_health"]);?>" aria-valuemin="0" aria-valuemax="<?php echo($fighter["skill_health"]);?>" style="width: <?php echo($fighter["current_health"]*100/$fighter["skill_health"]);?>%;">
						<?php 
							echo($fighter["current_health"]);
							echo("/");
							echo($fighter["skill_health"]);
						?>
						</div>
					</div>
				</div>
			</div>
                  
			<?php 
				if(isset($levelUpEnable) && ($levelUpEnable==true)){
					echo "Level up available !";
					echo "Choose the skill you want to up (+1)";
					echo $this->Form->create("lvlupform");
					echo $this->Form->radio('type', array(
					'upsight' => 'Sight',
					'upstrength' => 'Strength',
					'uphealth'=>'Health'
					));
					echo $this->Form->end(array('label' => 'lvl up', 'class' => 'btn btn-info'));
				}
			?>
             
            </div>
    </div>
    
    <div class="row">
        <legend>Tools</legend>
        <?php
      		pr($actualStuff);
        ?>
    </div>


    <?php }

    else{
    		echo "First, select a fighter !";
    	}?>

</section>




