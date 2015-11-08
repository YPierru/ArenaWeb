<section class="container-fluid" id="section4">
    <div  class="row">
            <div class="col-sm-6 ">
                <?php 
                    if(!empty($_SESSION["nameFighterSelected"])){
                            echo "Fighter selected : ";
                            pr($currentFighter);
                    }else{
                            echo "No fighter selected";
                    }
                ?>
            </div>

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
            </div>
           
    </div>
            

    <div class="row">
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

            </div>
              <div class="col-sm-6 ">
                  <?php   
                  if($selection){
                   pr($selectedFighterData);
           }
           ?>
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




