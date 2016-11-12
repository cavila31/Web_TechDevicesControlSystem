<?php
$this->assign('title', 'Revisión Solicitud');
?>
<div class="row">
    <div>
        <div class="row">
            <div class="col-md-4">
                <?= $this->Flash->render() ?>
            </div>
        </div>
        <div class="tickets index large-9 medium-8 columns content">
            <div class="col-lg-12 text-center">
                <h2>Revisión de Solicitud</h2>
                <hr class="star-primary">
            </div> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
  <div class="panel-body">
    <div class="col-md-4" >
          <?php if ($ticket->users[0]->foto_id != null){?>    
    <?php echo $this->Html->image($ticket->users[0]->foto_id, array('alt' => 'imagen cedula',  'height'=>'202', 'width'=>'320', 'class'=> 'img-responsive')); ?>
   <?php }?>
    </div>
    <br/><br/><br/><br/>
    
    
    
    <label class="col-lg-2 control-label">Fecha de Solicitud: </label>
    <div class="col-lg-2">
    <?= h($ticket->fecha_solicitud) ?>         
    </div>
    <label class="col-lg-2 control-label">Estado: </label>
    <div class="col-lg-2">
      <?= h($ticket->estado) ?>
    </div>
    
    
    
    <br/><br/><br/>
    <label class="col-lg-2 control-label">Solicitante: </label>
    <div class="col-lg-2">
    <?= h($ticket->users[0]->nombre) ?>         
    </div>          
    <label class="col-lg-1 control-label">Cédula: </label>
    <div class="col-lg-3">
    <?= h($ticket->users[0]->cedula) ?> 
    <a href="http://www.consulta.tse.go.cr/consulta_persona/consulta_cedula.aspx"> (Verificar Cédula)</a>
    </div>  
    
    
    
    <br/><br/><br/><br/>
    <label class="col-lg-2 control-label">Tipo de Activo: </label>
    <div class="col-lg-2">
      <?= h($ticket->tipo_activo) ?>
    </div> 
    <label class="col-lg-2 control-label">Marca: </label>
    <div class="col-lg-2">
      <?= h($ticket->marca) ?>
    </div>
    <br/><br/><br/>
    
    
    
    <label class="col-lg-2 control-label">Modelo: </label>
    <div class="col-lg-2">
      <?= h($ticket->modelo) ?>
    </div>
    <label class="col-lg-2 control-label">Número de Serie: </label>
    <div class="col-lg-2">
      <?= h($ticket->serie) ?>
    </div>
    <br/><br/><br/>
    
    
    <?php if ($ticket->placa_universitaria !=null){?>
    <label class="col-lg-2 control-label">Placa Universitaria: </label>
    <div class="col-lg-2">
      <?= h($ticket->placa_universitaria) ?>
    </div>
     <?php }?>

    <?php if ($ticket->observaciones !=null){?>
    <label class="col-lg-2 control-label">Observaciones: </label>
    <div class="col-lg-2">
      <?= h($ticket->observaciones) ?>
    </div>          
     <?php }?>
     
  </div>
  <div class="panel-footer">
      <?= $this->Form->create() ?>
              <?php if($ticket->estado=="Aprobado") {?>
            <?php echo $this->Form->button('Aprobar', ['type' => 'submit', 'class' => 'btn btn-success btn-sm', 'name'=>'Aprobar', 'disabled=disabled']);?>
            <?php echo $this->Form->button('Rechazar', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'name'=>'Rechazar', 'disabled=disabled']);?>
        <?php } else {?>
            <?php echo $this->Form->button('Aprobar', ['type' => 'submit', 'class' => 'btn btn-success btn-sm', 'name'=>'Aprobar']);?>
            <?php echo $this->Form->button('Rechazar', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'name'=>'Rechazar']);?>
        <?php }?>
    <?= $this->Form->end() ?>
  </div>
</div>
    </div>
</div>

