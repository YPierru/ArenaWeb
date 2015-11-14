<?php $this->assign('title', 'Welcome');?>




<section class="container-fluid" id="section1">
    <div class="v-center">
        <h1 class="text-center">Web Arena</h1>
        <h2 class="text-center lato animate slideInDown">This Game will <b>change</b> your life !</h2>
        <p class="text-center">
            <br>
            <?php
            if (!($this->Session->read('Auth.User'))){
                echo $this->Html->link('Connexion', array('controller' => 'Users', 'action' => 'login'), array( 'class' => 'btn btn-danger btn-lg btn-huge lato')); 
            }?>
        </p>
    </div>
    <a href="#section2">
		<div class="scroll-down bounceInDown animated">
            <span>
                <i class="fa fa-angle-down fa-2x"></i>
            </span>
		</div>
        </a>
</section>

<section class="container-fluid" id="section2">
    <div class="container v-center">
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInLeft animate">
                            <div class="panel-heading">
                            <h3>Personnage</h3></div>
                            <div class="panel-body">
                                <?php echo $this->Html->image('hero.jpg', array( 'class' => 'img-responsive thumbnail center-block '));?>
                                <p>Les différents personnages possèdent différentes caractéristiques que vous pourrez améliorer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInUp animate">
                            <div class="panel-heading">
                            <h3>Carte</h3></div>
                            <div class="panel-body">
                                <?php echo $this->Html->image('damier.png', array( 'class' => 'img-responsive thumbnail center-block '));?>
                                <p>La carte possedent différents objets qui permettent de s'améliorer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInRight animate">
                            <div class="panel-heading">
                            <h3>Jeu</h3></div>
                            <div class="panel-body">
                                <?php echo $this->Html->image('lolpetit.jpg', array( 'class' => 'img-responsive thumbnail center-block '));?>
                                <p>A chaque tour, vous pouvez attaquer ou vous déplacer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <div class="row">
            <br>
        </div>
    </div>
    <!--/container-->
</section>

<section class="container-fluid" id="section3">
    <h1 class="text-center">Un jeu de role et de stratégie</h1>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h3 class="text-center lato slideInUp animate">A peine sortie, ce jeu s'annonce comme le nouveau jeu de réference.</h3>
            <br>
            <p class="text-center">
                  <?php echo $this->Html->image('lol.jpg', array( 'class' => 'img-responsive thumbnail center-block'));?>               
            </p>
        </div>
    </div>
</section>



<section class="container-fluid" id="section7">
    <div class="row">
    </div>
</section>


