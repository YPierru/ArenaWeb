<?php $this->assign('title', 'Sight');?>
<!--<?php echo $this->Html->image('1.jpg', array('style' => 'width:100px;', 'class' => 'img-circle img-responsive img-thumbnail'));?>-->
<section class="container-fluid" id="section8">
    
    <div class="row">
            <div class="col-sm-8 ">
				<div class="row">
					<div class="col-sm-10 col-md-offset-1">
						<?php
						echo('[');
						 echo($fighter['coordinate_x']);
						 echo(':');
						echo($fighter['coordinate_y']);
						echo(']');
						
						for ($i = 15; $i >= 1; $i--) {
							echo("<div class=\"row\">");
							
							for ($j = 1; $j <= 30; $j++) {
								if(isset($map[$j][$i]['fighter']['Fighter']['name'])){
									/*si c'est notre fighter*/
									if($j == $fighter['coordinate_x'] && $i == $fighter['coordinate_y']){
										echo $this->Html->image('fighter.png');
									}else{/*si c'est un autre*/
										echo $this->Html->image('autre.png');
									}
								}else if(isset($map[$j][$i]['tool']['Tool']['id'])){
										echo $this->Html->image('tool.png');
								}else{/*case vide*/
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
									/*echo $this->Form->create('pickStuff', array(
									'inputDefaults' => array(
									'div' => 'form-group',
									'wrapInput' => false,
									'class' => 'form-control'
									),
									'class' => 'well'
									));*/
									echo "<legend>Ramassez un objet</legend>";
									echo "Vous êtes sur l'objet suivant : ";
									pr($tool);
									echo "NE FONCTIONNE PAS";
									echo $this->Html->link('Login', array('controller' => 'Arenas', 'action' => 'sight'), array('class'=>'btn btn-info'));
									
									//echo $this->Form->button(array('label' => 'Pickup de balzen', 'class' => 'btn btn-info'));
									//echo $this->Form->end();
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
        <legend>Carte</legend>
        <?php
        pr($map);
		pr($fighter);
        ?>
    </div>

</section>




