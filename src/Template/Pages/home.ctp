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
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro Equipo - ECCI</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <?= $this->Html->css('freelancer.css') ?>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
<?= $this->Flash->render('auth') ?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php echo $this->Html->link('Inicio', ['controller' => 'Pages', 'action' => 'display', 'home'], ['class' => 'navbar-brand']); ?>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>

                                            <?php
               if ($this->request->session()->read('Auth.User'))
                    {?>
                                      
    <?php
    switch ($this->request->session()->read('Auth.User.role')) {
    case 'Estudiante':
        ?>
                    <li class="page-scroll">
                   <?php echo $this->Html->link('Mi Perfil', ['controller' => 'Users', 'action' => 'view']); ?>
                    </li>          
                    <li class="page-scroll">
                   <?php echo $this->Html->link('Nueva Solicitud', ['controller' => 'Tickets', 'action' => 'add']); ?>
                    </li>
                    <li class="page-scroll">
                   <?php echo $this->Html->link('Mi Historial de Boletas', ['controller' => 'Tickets', 'action' => 'index']); ?>
                    </li>        
        <?php
        break;
        ?>
    <?php    
    case 'Administrador':
        ?>
                   <li class="page-scroll">
                   <?php echo $this->Html->link('Mi Perfil', ['controller' => 'Users', 'action' => 'view']); ?>
                    </li>                  
                   <li class="page-scroll">
                   <?php echo $this->Html->link('Crear Usuario', ['controller' => 'Users', 'action' => 'adduser']); ?>
                    </li>                    
                    
                    <li class="page-scroll">
                   <?php echo $this->Html->link('Solicitudes', ['controller' => 'Tickets', 'action' => 'indexSolicitud']); ?>
                    </li>        
        <?php
        break;
        ?> 
    <?php    
    case 'Guarda':
        ?>
                   <li class="page-scroll">
                   <?php echo $this->Html->link('Mi Perfil', ['controller' => 'Users', 'action' => 'view']); ?>
                    </li> 
                   <li class="page-scroll">
                   <?php echo $this->Html->link('Buscar Boleta', ['controller' => 'Tickets', 'action' => 'consulta']); ?>
                    </li>    
        <?php
        break;
        ?>      
        
        <?php    }?>

                                        
      
                   <li class="page-scroll">
                   <?php echo $this->Html->link('Salir', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'navbar-brand']); ?>
                   </li>
                    
               <?php     }
                else { ?>
                                    <li class="page-scroll">

                     <?php echo $this->Html->link('Iniciar Sesión', ['controller' => 'Users', 'action' => 'login'], ['class' => 'btn btn-lg btn-outlin']); ?>
                     </li>
                     <?php    }?>

                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" width="30%" height="30%" src="/img/padlock.svg" alt="">
                    <div class="intro-text">
                        <span class="name">Bienvenido</span>
                        <hr class="star-light">
                        <span class="skills">Plataforma de registro de equipo tecnológico para uso personal.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Acerca de</h2>
                    <hr class="star-primary">
                </div>
            </div>
                      <div class="intro-text">
                          <div class="text-center">
                        <p class="skills">Este sistema nace como una alternativa digital al procedimiento existente en la Escuela de Ciencias de la Computación e Informática para el registro de equipo tecnológico y su circulación dentro del edificio.

<br/>Se espera que con el nuevo sistema aumente la rapidez con la que se hace acceso hacia y desde el edificio, así como una considerable mejora en términos de seguridad para el equipo y sus dueños. Por último, podría ayudar a disminuir la huella ecológica del proceso actual a base de papel.</p>
<br/><p class="skills">A continuación encontrará el manual de usuario del sistema: </p>
<a target="_blank" href="https://drive.google.com/open?id=0BwJfdrCeJpumQlJtdjNsSmhJMzQ" class="btn btn-link">Manual_de_Usuario_Estudiante_y_Profesor.pdf</a>
                    </div>  
                    </div> 
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-6">
                        <h3>ECCI, UCR</h3>
                        <p>San Pedro de Montes de Oca<br>Costa Rica</p>
                    </div>
                    <div class="footer-col col-md-6">
                        <h3>Redes Sociales</h3>
                        <ul class="list-inline">
                            <li>
                                <a target="_blank" href="https://www.facebook.com/ECCI-Oficial-126519367394928/?fref=ts" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>

                            <li>
                                <a target="_blank" href="http://www.ecci.ucr.ac.cr/" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; ECCI 2016
                             <?php echo $this->Html->link('Créditos', ['controller' => 'Pages', 'action' => 'display', 'creditos'], ['class' => 'btn btn-link']); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <?php echo $this->Html->script('jquery');?>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>-->
    <script src="/js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="/js/jqBootstrapValidation.js"></script>
    <script src="/js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/freelancer.js"></script>

</body>

</html>

