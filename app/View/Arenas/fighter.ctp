<?php $this->assign('title', 'Fighter');?>
<?echo $this->Html->script('fighter');?>


<?php 

echo $this->Form->create('Fighterselect');
echo $this->Form->input('selected_fighter', array(
      'options' => $names
  ));
echo $this->Form->end('Show');

if($selection){
	pr($selectedFighterData);
}
/*
$id="id";
echo $this->Html->link("Demo", array('controller' => 'Arenas','action'=> 'fighter'), array( 'class' => 'button'));
*/

echo $this->Form->button('Btn',array('id'=>'create'));
?>