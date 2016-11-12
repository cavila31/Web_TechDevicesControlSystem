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
    <br />
    <div>
        <div class="row">
            <div class="col-md-4">
                <?= $this->Flash->render() ?>
            </div>
        </div>
        <div class="tickets index large-9 medium-8 columns content">
            <div class="col-lg-12 text-center">
                <h2>Cambiar Contraseña</h2>
                <hr class="star-primary">
            </div> 
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-default col-md-6 col-md-offset-3">
    <div class="panel-body">
        <?= $this->Form->create(); ?>
            <fieldset>
                <label>Correo: </label>
                <?php echo $this->Form->username('username', ['class' => 'form-control']); ?>
                <label>Contraseña actual: </label>
                <?php echo $this->Form->password('password', ['class' => 'form-control']);?>
                <label>Contraseña nueva: </label>
                <?php echo $this->Form->password('passwordNuevo1', ['class' => 'form-control']);?>
                <label>Confirmar contraseña: </label>
                <?php echo $this->Form->password('passwordNuevo2', ['class' => 'form-control']);?>
            </fieldset>
            <br/>
            <?php echo $this->Form->button('Aceptar', ['type' => 'submit', 'class' => 'btn btn-success btn-lg btn-block']);?>
        <?= $this->Form->end() ?>
    </div>
    </div>
</div>