<meta charset="utf-8">
<?=$this->assign('title', 'Iniciar Sesión');?>


<div class="col-md-4" style="padding-top:30px">
    <?= $this->Flash->render() ?>
</div>

<div class="col-md-6 col-md-offset-3">  
                <div class="col-lg-12 text-center">
                    <h2>Iniciar Sesión</h2>
                    <hr class="star-primary">
                </div>
            </div>

<div class="col-md-6 col-md-offset-3">  
<label>¿Usuario Nuevo? </label>
<?php echo $this->Html->link('Crear Nueva Cuenta', ['controller' => 'Users', 'action' => 'add']); ?><br/>
<br/>

<div class="panel panel-default">
  <div class="panel-heading"> Por favor ingrese su correo y contraseña</div>
  <div class="panel-body">
<div class="users form">

<?= $this->Form->create() ?>
    <fieldset>
        
        <label>Correo: </label>
        <?= $this->Form->username('username', ['class' => 'form-control']); ?>
        <label>Contrase&ntilde;a: </label>
        <?= $this->Form->password('password', ['class' => 'form-control']);?>        
        
    </fieldset>
<br/>    
<?= $this->Form->button(__('Iniciar Sesión'), ['class' => 'btn btn-success btn-lg btn-block']); ?>
<?= $this->Form->end() ?>
</div>
</div>
</div>
 <?php echo $this->Html->link('Olvidé mi contraseña', ['controller' => 'Users', 'action' => 'admpassword']); ?>
     <br/>
 <?php echo $this->Html->link('Cambiar mi contraseña', ['controller' => 'Users', 'action' => 'changepassword']); ?>
</div>