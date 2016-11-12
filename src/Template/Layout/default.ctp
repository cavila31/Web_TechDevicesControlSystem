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

$cakeDescription = 'Registro Equipo';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>-
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?= $this->Html->css('freelancer.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/js/classie.js"></script>
    <script src="/js/cbpAnimatedHeader.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/freelancer.js"></script>
    
        <script>
        (function( $ ) {
             $(document).ready( function() {
                $('#flash-flash').delay(10000).fadeOut();
            });
        })( jQuery );
        
        (function( $ ) {
                var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity("Campo Requerido");
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })( jQuery );
    </script>
</head>
<body id="page-top" class="index">

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
    <div class="col-md-12">
     <br/>
     <br/>
    </div> 
    </header>

    <?= $this->Flash->render() ?>
    <div class="container clearfix" style="padding-top:120px; padding-bottom:70px">
     <br/>
     <br/>
    <?= $this->fetch('content') ?>
    </div>
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
</body>

</html>