<?php $this->assign('title', 'Sight');?>

<h1>Move your fighter</h1>
<?php
echo $this->Form->create('Fightermove');

echo $this->Form->input('direction',
						array('options' => array('north'=>'north','south'=>'south','east'=>'east','west'=>'west'), 
						'default' => 'east'));

echo $this->Form->end('Move');
?>

<h1>Attack on a position</h1>
<?php
echo $this->Form->create('Fighterattack');

echo $this->Form->input('direction',
						array('options' => array('north'=>'north','south'=>'south','east'=>'east','west'=>'west'), 
						'default' => 'east'));

echo $this->Form->end('Attack');
?>

<p>Fighter</p>

<?php 

pr($fighter);

?>