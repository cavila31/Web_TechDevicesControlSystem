<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Event\Event;

$this->assign('title', 'Solicitudes');
?>    
    <div class="tickets index large-9 medium-8 columns content">
                    <div class="col-lg-12 text-center">
                        <h2>Manejo de Solicitudes</h2>
                        <hr class="star-primary">
                    </div>    
    <br/>                
    <br/>     
    <br/>                
    <br/>
    <br/>                
    <br/>  
    
    <div class="panel panel-default">
      <div class="panel-heading">Búsqueda</div>
      <div class="panel-body">
          
        <div class="form-group">
            
       <?= $this->Form->create() ?>
        <fieldset>
          <label for="inputId" class="col-lg-1 control-label">Id</label>
          <div class="col-lg-3">
          <?= $this->Form->input('inputId', ['label' => false , 'class' => 'form-control', 'value'=> '']); ?>
          </div>
    
          <label for="selectEstado" class="col-lg-1 control-label">Estado</label>
          <div class="col-lg-3">
                <?php echo $this->Form->select(
                                    'selectEstado',
                                    ['Pendiente','Aprobado','Vencido'],
                                    ['empty' => 'Seleccionar', 'class' => 'form-control']
                );?> 
            </div>
     
          <label for="tipo_activo" class="col-lg-1 control-label">Tipo Activo</label>
                                
           <div class="col-lg-3">  
            <?php echo $this->Form->select(
                                    'tipo_activo',
                                    ['Computadora','Disco Duro','Impresora','CPU','Monitor','Video Beam','Servidor','Tableta', 'Otro'],
                                    ['empty' => 'Seleccionar', 'class' => 'form-control']
                                ); ?> 
     </div>        
    
        </fieldset>

        </div>

    <?php echo $this->Form->button('Buscar', ['type' => 'submit', 'class' => 'btn btn-success']);?>
    <?= $this->Form->end() ?>
      </div>
    </div>  
                    <div class='table-responsive'>
                    <table class="table table-striped table-hover ">
      <thead>
        <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fecha_solicitud') ?></th>
                    <th><?= $this->Paginator->sort('Solicitante') ?></th>
                    <th><?= $this->Paginator->sort('tipo_activo') ?></th>
                    <th><?= $this->Paginator->sort('marca') ?></th>                
                    <th><?= $this->Paginator->sort('modelo') ?></th>
                    <th><?= $this->Paginator->sort('estado') ?></th>
    
                <!--    <th><?= $this->Paginator->sort('placa_universitaria') ?></th>
                    <th><?= $this->Paginator->sort('observaciones') ?></th>
                    <th class="actions"><?= __('Serie') ?></th>                
                    <th class="actions"><?= __('Fecha Expiración') ?></th>
                    <th class="actions"><?= __('Código QR') ?></th>
                -->
                    <th class="actions"><?= __('') ?></th>
                </tr>
            </thead>
            <legend></legend>
    
            <tbody>
                <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?= $this->Number->format($ticket->id) ?></td>
                    <td><?= h($ticket->fecha_solicitud) ?></td>
                    <td><?= h($ticket->users[0]->nombre) ?></td>
                    <td><?= h($ticket->tipo_activo) ?></td>
                   
                     <td><?= h($ticket->marca) ?></td>
                    <td><?= h($ticket->modelo) ?></td>
                 <!--   <td><?= h($ticket->placa_universitaria) ?></td>
                    <td><?= h($ticket->observaciones) ?></td>
                    <td><?= h($ticket->serie) ?></td>
                    <td><?= h($ticket->fecha_expiracion) ?></td>
                  
                -->
                   <?php
                   if ($ticket->estado =='Pendiente')
                        {?>                
                    <td><span class="text-warning"><?= h($ticket->estado) ?></span></td>
                    
                        <?php
                        }?>    
                        
                   <?php
                   if ($ticket->estado =='Aprobado')
                        {?>                
                    <td><span class="text-success"><?= h($ticket->estado) ?></span></td>
                    
                        <?php
                        }?>   
                   <?php
                   if ($ticket->estado =='Vencido')
                        {?>                
                    <td><span class="text-danger"><?= h($ticket->estado) ?></span></td>
                    
                        <?php
                        }?>  
    
                    <td class="actions">
                        <?= $this->Form->postLink(__('Detalles'), ['action' => 'view', $ticket->id], ['class' => 'btn btn-primary btn-sm']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
                    </div>
        
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
