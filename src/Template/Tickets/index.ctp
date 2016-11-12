
<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Event\Event;

$this->assign('title', 'Mi Historial de Boletas');

?> 

<div class="tickets index large-9 medium-8 columns content">
    <div class="col-lg-12 text-center">
        <h2>Mi Historial de Boletas</h2>
        <hr class="star-primary">
    </div>    
   <div class='table-responsive'>          
    <table class="table table-striped table-hover ">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('id') ?></th>
        <th><?= $this->Paginator->sort('marca') ?></th>                
        <th><?= $this->Paginator->sort('modelo') ?></th>
        <th class="actions"><?= __('Serie') ?></th>
    <!--    <th><?= $this->Paginator->sort('placa_universitaria') ?></th>
        <th><?= $this->Paginator->sort('tipo_activo') ?></th>
        <th><?= $this->Paginator->sort('observaciones') ?></th>
        <th><?= $this->Paginator->sort('fecha_solicitud') ?></th>
    -->
        <th class="actions"><?= __('Fecha Expiración') ?></th>
        <th class="actions"><?= __('Estado') ?></th>
        <th class="actions"><?= __('Código QR') ?></th>
        <th class="actions"><?= __('Acciones') ?></th>
    </tr>
    </thead>
    <legend></legend>
    <tbody>
        <?php foreach ($tickets as $ticket): ?>
        <tr>
            <td><?= $this->Number->format($ticket->id) ?></td>
             <td><?= h($ticket->marca) ?></td>
            <td><?= h($ticket->modelo) ?></td>
            <td><?= h($ticket->serie) ?></td>
         <!--   <td><?= h($ticket->placa_universitaria) ?></td>
            <td><?= h($ticket->tipo_activo) ?></td>
            <td><?= h($ticket->observaciones) ?></td>
            <td><?= h($ticket->fecha_solicitud) ?></td>
        -->
            <td><?= h($ticket->fecha_expiracion) ?></td>
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
                           <?php
           if ($ticket->estado =='Aprobado')
                {?>   
            <td><?= $this->Html->link(__('Descargar'), ['action' => 'download', $ticket->id, ], ['class' => 'btn btn-default btn-sm']) ?></td>
                 <?php
                }
                else {?>
            <td><?= $this->Html->link(__('Descargar'), ['action' => 'download', $ticket->id], ['class' => 'btn btn-default btn-sm disabled']) ?></td>
                <?php
                }?>  
            <td class="actions">
                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $ticket->id], ['class' => 'btn btn-danger btn-sm'], ['confirm' => __('Está seguro que desea borrar la Boleta # {0}?', $ticket->id)]) ?>
           <?php
           if ($ticket->estado =='Vencido')
                {?>                
                <?= $this->Html->link(__('Renovar'), ['action' => 'renovar', $ticket->id], ['class' => 'btn btn-success btn-sm']) ?>
            
                <?php
                }?>                     
                
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

<script>
jQuery.noConflict();
 (function ancho() {
     $(window).width();
})( jQuery );
</script>