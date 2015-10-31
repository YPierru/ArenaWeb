<?php $this->assign('title', 'Fighter');?>


<?php 

echo $this->Form->create('Fighterselect');
echo $this->Form->input('selected_fighter', array(
      'options' => $names,
      'value' => ''
  ));
echo $this->Form->end('Show');

$name=$selectedFighterData["name"];
$sight=$selectedFighterData["skill_sight"];
$strength=$selectedFighterData["skill_strength"];
$maxHealth=$selectedFighterData["skill_health"];
$currentHealth=$selectedFighterData["current_health"];
$xp=$selectedFighterData["xp"];
$level=$selectedFighterData["level"];


echo $this->Form->create('Fightercreate');
echo $this->Form->end('Create new fighter');


?>
<h1><?php echo $name;?></h1>
<p><strong>Position</strong> : <?php echo $sight;?></p>
<p><strong>Sight</strong> : <?php echo $sight;?></p>
<p><strong>Strength</strong> : <?php echo $strength;?></p>
<p><strong>Max health</strong> : <?php echo $maxHealth;?></p>
<p><strong>Current health</strong> : <?php echo $currentHealth;?></p>
<p><strong>XP</strong> : <?php echo $xp;?></p>
<p><strong>Level</strong> : <?php echo $level;?></p>