<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Event\Event;
$this->assign('title', 'Cambiar Contraseña');
?>
<!DOCTYPE html>

<div class="row">
        <div class="row">
            <div class="col-md-4">
                <?= $this->Flash->render() ?>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <h2>Cambiar Contraseña</h2>
            <hr class="star-primary">
        </div>
</div>

<div class="row">
<div class="col-md-3">
</div>
<div class="panel panel-default col-md-6">
  <div class="panel-body">
            <?= $this->Form->create(null, ['id' => 'web-form']); ?>

            <?= $this->Form->hidden('reset_password_token', ['value' => $reset_password_token]); ?>
            <fieldset>

              <label>Contraseña nueva: </label>
              <?php echo $this->Form->password('password', ['class' => 'form-control', 'value'=> '']);?>
              <label>Confirmar contraseña: </label>
              <?php echo $this->Form->password('confirm_passwd', ['class' => 'form-control']);?>
              
            </fieldset>
            <br/>
            <?php echo $this->Form->button('Aceptar', ['type' => 'submit', 'class' => 'btn btn-success btn-lg btn-block', 'id' => 'submit']);?>

            <?= $this->Form->end() ?>
  </div>
</div>
</div>


