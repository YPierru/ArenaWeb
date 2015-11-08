<?php $this->assign('title', 'Sight');?>
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
            <?php 
                echo $this->Form->end(array('label' => 'Move', 'class' => 'btn btn-info')); 
            ?>




            <?php 
            echo $this->Form->create('Fighterattack', array(
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
        <div class="col-sm-6 ">
            <legend>Ton guerrier</legend>
            <?php
            pr($fighter);

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
        ?>
    </div>
</section>