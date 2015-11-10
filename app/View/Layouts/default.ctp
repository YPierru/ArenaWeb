<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Arena Web ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
                echo $this->Html->css('bootstrap.min.css');
                echo $this->Html->css('styles.css');
        echo $this->Html->script('jquery');
                echo $this->Html->script('bootstrap.min.js');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
            
    
</head>
<body>
      <div id="header">
                    <nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                                        <?php echo $this->Html->link('WebArena', array('controller' => 'Arenas', 'action' => 'index'), array('class'=> 'navbar-brand text-danger')); ?>
                                        <!--<a class="navbar-brand text-danger" href="#">WebArena</a>
                                            <?php echo $this->Html->link('WebArena', array('controller' => 'Arenas', 'action' => 'index')); ?>-->
                </div>
                <div class="navbar-collapse collapse" id="navbar-collapsible">
                    <ul class="nav navbar-nav navbar-left">
                                                <li><?php echo $this->Html->link('Welcome', array('controller' => 'Arenas', 'action' => '/')); ?></li>
                                                <?php
                                                 if (!($this->Session->read('Auth.User'))){
                                                    echo('<li>');
                                                    echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login'));
                                                    echo('</li>');
                                                 }
                                                 if ($this->Session->read('Auth.User')){
                                                    echo('<li>');
                                                    echo $this->Html->link('Fighters', array('controller' => 'Arenas', 'action' => 'fighter'));
                                                    echo('</li> <li>');
                                                    echo $this->Html->link('Sight', array('controller' => 'Arenas', 'action' => 'sight'));
                                                    echo('</li> <li>');
                                                    echo $this->Html->link('Diary', array('controller' => 'Arenas', 'action' => 'diary'));
                                                    echo('</li> <li>');
                                                    echo $this->Html->link('Déconnexion', array('controller' => 'Users', 'action' => 'logout'));
                                                    echo('</li>');
                                                }?>
                        <li>&nbsp;</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-heart-o fa-lg"></i></a></li>
                    </ul>
                </div>
            </div>
                    </nav>
          
            </div>

 <?php echo $this->fetch('content'); ?>
    
    
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-3 column">
                <h4>Développeurs</h4>
                <ul class="nav">
                    <li><a href="#">Charles Costrel</a></li>
                    <li><a href="#">Clément Matthey</a></li>
                    <li><a href="#">Yan Pierru</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
            <div class="col-xs-6 col-md-3 column">
                <h4>Nous suivre</h4>
                <ul class="nav">
                    <li><a href="https://twitter.com/">Twitter</a></li>
                    <li><a href="https://www.facebook.com/">Facebook</a></li>
                    <li><a href="https://plus.google.com/">Google+</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
            <div class="col-xs-6 col-md-3 column">
                <h4>Sources</h4>
                <ul class="nav">
                    <li><a href="http://cakephp.org/">CakePHP</a></li>
                    <li><a href="http://getbootstrap.com/">Bootstrap</a></li>
                    <li><a href="https://github.com/YPierru/ArenaWeb">Github</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
            <div class="col-xs-6 col-md-3 column">
                <h4>Autres</h4>
                <ul class="nav">
                    <li><a href="#">Gr2-02-AF</a></li>
                    <li><a href="#">Arena web</a></li>
                    <li><a href="#">Prof Mr Falconet</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                </ul>
            </div>
        </div>
        <!--/row-->
        <p class="text-right">©2015</p>
    </div>
</footer>

<div class="scroll-up">
    <a href="#"><i class="fa fa-angle-up"></i></a>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center"><img src="//placehold.it/110" class="img-circle"><br>Login</h2>
            </div>
            <div class="modal-body row">
                <h6 class="text-center">COMPLETE THESE FIELDS TO SIGN UP</h6>
                <form class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger btn-lg btn-block">Sign In</button>
                        <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <h6 class="text-center"><a href="">Privacy is important to us. Click here to read why.</a></h6>
            </div>
        </div>
    </div>
</div>
    <!--scripts loaded here-->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <script src="js/scripts.js"></script>
</body>
</html>