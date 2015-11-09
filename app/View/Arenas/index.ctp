<?php $this->assign('title', 'Welcome');?>




<section class="container-fluid" id="section1">
    <div class="v-center">
        <h1 class="text-center">Web Arena</h1>
        <h2 class="text-center lato animate slideInDown">This Game will <b>change</b> your life !</h2>
        <p class="text-center">
            <br>
            <a href="#" class="btn btn-danger btn-lg btn-huge lato" data-toggle="modal" data-target="#myModal">Connexion</a>
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
                                <p>Les différents personnages possèdent des caractéristiques différentes en fonction de vous.</p>
                                <hr>GO
                                <hr>
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
                                <hr>GO
                                <hr>
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
                                <hr>GO
                                <hr>
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

<section>
    <div class="container-fluid v-center">
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <?php echo $this->Html->image('1.jpg', array('style' => 'width:100px;', 'class' => 'img-circle img-responsive img-thumbnail'));?>
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <?php echo $this->Html->image('2.jpg', array('style' => 'width:100px;', 'class' => 'img-circle img-responsive img-thumbnail'));?>
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <?php echo $this->Html->image('3.jpg', array('style' => 'width:100px;', 'class' => 'img-circle img-responsive img-thumbnail'));?>
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <?php echo $this->Html->image('4.jpg', array('style' => 'width:100px;', 'class' => 'img-circle img-responsive img-thumbnail'));?>
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <?php echo $this->Html->image('5.jpg', array('style' => 'width:100px;', 'class' => 'img-circle img-responsive img-thumbnail'));?>
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <?php echo $this->Html->image('6.jpg', array('style' => 'width:100px;', 'class' => 'img-circle img-responsive img-thumbnail'));?>
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <?php echo $this->Html->image('1.jpg', array('style' => 'width:100px;', 'class' => 'img-circle img-responsive img-thumbnail'));?>
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <?php echo $this->Html->image('5.jpg', array('style' => 'width:100px;', 'class' => 'img-circle img-responsive img-thumbnail'));?>
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
        </div>
        <!--/row-->
    </div>
</section>

<section class="container-fluid" id="section3">
    <h1 class="text-center">Un jeu de role et de stratégie</h1>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h3 class="text-center lato slideInUp animate">A peine sortie, ce jeu s'annonce comme le nouveau jeu de réference.</h3>
            <br>
            <div class="row">                            
                <div class="col-xs-4 col-xs-offset-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                <div class="col-xs-2"></div>
                <div class="col-xs-4 text-right">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</div>
            </div>
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


