<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Event\Event;

$this->assign('title', 'Mi Perfil');
?>
<div class="users view large-9 medium-8 columns content">
    
          <div class="col-lg-12 text-center">
              <h2>Mi Cuenta</h2>
          <hr class="star-primary">
          </div>


          <div class="col-lg-12">
          <div class="panel panel-default">
          <div class="panel-body">
          <?php if ($user->foto_id != null){?>  
          <div class="col-md-5" >
                  <?php echo $this->Html->image($user->foto_id, array('alt' => 'imagen cedula',  'height'=>'202', 'width'=>'320', 'class'=> 'img-responsive')); ?>
          </div>
          <?php }?>
          <br/>
        <?= $this->Form->create($user, ['type' => 'file']) ?>
        <fieldset>
          <label for="inputId" class="col-lg-2 control-label">Correo: </label>
          <div class="col-lg-8">
          <?= $this->Form->input('username', ['label' => false , 'class' => 'form-control', 'default'=>$correo, 'disabled'=>true]); ?>          
          </div>

          <br/><br/><br/>
    
          <label for="inputId" class="col-lg-2 control-label">Nombre: </label>
          <div class="col-lg-8">
          <?= $this->Form->input('nombre', ['label' => false , 'class' => 'form-control', 'default'=>$nomb, 'disabled'=>true]); ?>          
          </div>
          <br/><br/><br/>
          
          <label for="inputId" class="col-lg-2 control-label">Cédula: </label>
          <div class="col-lg-6">
          <?= h($user->cedula) ?>          
          </div>
          <br/><br/><br/>
          
        </fieldset>

  </div>
  <div class="panel-footer"> 
  <?php if ($this->request->session()->read('Auth.User.role')=='Guarda') { ?>
      <?php echo $this->Html->link('Editar', ['controller' => 'Users', 'action' => 'edit'], ['class' => 'btn btn-primary btn-sm', 'disabled=disabled']); ?>
  <?php } 
  else {?>
  <?php echo $this->Html->link('Editar', ['controller' => 'Users', 'action' => 'edit'], ['class' => 'btn btn-primary btn-sm']); ?>
    <?php } ?>
    <?= $this->Form->end() ?>
</div>
</div>
</div>
</div>