<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Event\Event;

$this->assign('title', 'Crear Usuarios');
?>

<div class="row">
    <div class="row">
        <div class="col-md-4">
            <?= $this->Flash->render() ?>
        </div>
    </div>
    <div class="col-lg-12 text-center">
        <h2>Crear Usuarios</h2>
        <hr class="star-primary">
    </div> 
</div>

<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="users form">
                <?= $this->Form->create($user, ['type' => 'file']) ?>
                    
                    <fieldset>
          <label for="tipo_rol" class="col-lg-2 control-label">Tipo de cuenta</label>
          <div class="col-lg-4">
                <?php echo $this->Form->select(
                                    'tipo_rol',
                                    ['Administrador','Oficial de Seguridad'],
                                    ['empty' => 'Seleccionar', 'class' => 'form-control']
                );?> 
                
            </div>
                        <br/><br/><br/><br/>
                        
                        <label class="col-lg-2 control-label">Nombre completo: </label>
                                  <div class="col-lg-4">

                        <?php echo $this->Form->text('nombre', ['class' => 'form-control']); ?>
                        </div>
                        
                        <label class="col-lg-2 control-label">C&eacute;dula: </label>
                                  <div class="col-lg-4">

                        <?php echo $this->Form->text('cedula', ['class' => 'form-control']);?>
                        </div>
                        <br/><br/><br/>
                        
                        <label class="col-lg-2 control-label">Correo: </label>
                                  <div class="col-lg-4">

                        <?php echo $this->Form->username('username', ['class' => 'form-control']); ?>
                        </div>
                        
                        
                        <label class="col-lg-2 control-label">Contrase&ntilde;a: </label>
                                  <div class="col-lg-4">

                        <?php echo $this->Form->password('password', ['class' => 'form-control']);?>
                        </div>
                        <br/><br/>
                        
                    </fieldset>
                    <br/>
                
            </div>
        </div>
          <div class="panel-footer">
      <?php echo $this->Form->button('Aceptar', ['type' => 'submit', 'class' => 'btn btn-success btn-sm', 'name'=>'Aceptar']);?>
      <?php echo $this->Form->button('Cancelar', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm' , 'name'=>'Cancelar']);?>
      <?= $this->Form->end() ?>
          </div>

    </div>
</div>
</div>