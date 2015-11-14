<?php $this->assign('title', 'Diary');?>

<section class="container-fluid" id="section5">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <h2 class="text-center lato">Journal des activités</h2>
            
            <?php
            foreach($diary as $event){ ?>
                
                <hr>
                <div class="media">
                    <h4><?php echo($names[]=$event["date"]);?></h4>
                    <div class="media-left"><h4>[<?php echo($names[]=$event["coordinate_x"]);?>;<?php echo($names[]=$event["coordinate_y"]);?>]</h4></div>
                    <div class="media-body"><h4><?php echo($names[]=$event["name"]);?></h4></div>
                </div>
            
            <?php }?>
           

        </div>
    </div>
</section>