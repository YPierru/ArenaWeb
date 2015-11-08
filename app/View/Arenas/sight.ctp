<?php $this->assign('title', 'Sight');?>

<<<<<<< HEAD
<h1>Move your fighter</h1>
<?php
echo $this->Form->create('Fightermove');
echo $this->Form->input('direction',
	array('options' => array('north'=>'north','south'=>'south','east'=>'east','west'=>'west'),'default' => 'east'));
echo $this->Form->end('Move');
?>

<h1>Attack on a position</h1>
<?php
echo $this->Form->create('Fighterattack');
echo $this->Form->input('direction',
	array('options' => array('north'=>'north','south'=>'south','east'=>'east','west'=>'west'),'default' => 'east'));
echo $this->Form->end('Attack');
?>

<p>Map</p>
<?php
pr($map);
?>

<p>Fighter</p>
<?php 
pr($fighter);
?>
=======
<section class="container-fluid" id="section4">
    
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


            </div>    
            <div class="col-sm-6 ">
                <legend>Ton guerrier</legend>
                    <?php 
                    pr($fighter);
                    ?>
            </div>
    </div>
    
    <div class="row">
        <legend>Carte</legend>
        <?php
        pr($map);
        ?>
    </div>

</section>



>>>>>>> 09aeea23ace65e634f0caeab5172848e61efacd6
