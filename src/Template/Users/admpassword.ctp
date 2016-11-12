<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Event\Event;

$this->assign('title', 'Olvidé Contraseña');
?>
<div class="col-lg-12 text-center">
    <h2>Olvidé Contraseña</h2>
    <hr class="star-primary">
</div>
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
  <div class="panel-heading">Olvidé mi contraseña</div>
  <div class="panel-body">
      <div class="users form">
            <?= $this->Form->create() ?>
<fieldset>
         
                    <label>Correo: </label>
                    <?= $this->Form->username('username', ['class' => 'form-control']); ?>
</fieldset>
 <br/>
<?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-success btn-lg btn-block']); ?>
 <?php echo $this->Form->end(); ?>
  </div>
</div>
</div>
</div>

