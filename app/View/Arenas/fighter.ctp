<?php $this->assign('title', 'Fighter');?>
<?echo $this->Html->script('fighter');?>


<?php 

if(!empty($_SESSION["nameFighterSelected"])){
	echo "Fighter selected : ";
	pr($currentFighter);
}else{
	echo "No fighter selected";
}

echo $this->Form->create('Fighterselect');
echo $this->Form->input('selected_fighter', array(
      'options' => $names
  ));
echo $this->Form->end('Select');


echo "<hr>";


echo "Details";

echo $this->Form->create('Fighterdetails');
echo $this->Form->input('details_fighter', array(
      'options' => $names
  ));
echo $this->Form->end('Show details');

if($selection){
	pr($selectedFighterData);
}


echo "<hr>";


echo "Create fighter";
echo $this->Form->create('Fightercreate');
echo $this->Form->text('name');
echo $this->Form->end('Create');

?>