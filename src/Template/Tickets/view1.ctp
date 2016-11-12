<?php
$this->assign('title', 'Información Boleta');
?>
<div class="row">
    <div style="padding-top:20px">
        <div class="row">
            <div class="col-md-4">
                <?= $this->Flash->render() ?>
            </div>
        </div>
        <div class="tickets index large-9 medium-8 columns content">
            <div class="col-lg-12 text-center">
                <h2>Información de la Boleta</h2>
                <hr class="star-primary">
            </div> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
     <div class="intro-text">   
<div class="panel panel-default">
  <div class="panel-heading">    
  <div class="col-md-offset-1">
    <?php if ($ticket->users[0]->foto_id != null){?>    
  <?php echo $this->Html->image($ticket->users[0]->foto_id, array('alt' => 'imagen cedula',  'height'=>'202', 'width'=>'320', 'class'=> 'img-responsive')); ?>
    <?php }?>
</div>
</div>
  <div class="panel-body">
    <table class="vertical-table" style="border-spacing: 8px; border-collapse: separate">
                        <tr><td>
                            <?php echo $this->Form->label($ticket->users[0]->nombre, 'Nombre:'); ?>
                            <?= h($ticket->users[0]->nombre) ?>
                        </td></tr>                         
                        <tr><td>
                            <?php echo $this->Form->label($ticket->users[0]->cedula, 'Cédula:'); ?>
                            <?= h($ticket->users[0]->cedula) ?>
                        </td></tr>
                        <tr><td>
                            <?php echo $this->Form->label($ticket->tipo_activo, 'Tipo de Equipo:'); ?>
                            <?= h($ticket->tipo_activo) ?>
                        </td></tr>                        
                        <tr><td>
                            <?php echo $this->Form->label($ticket->marca, 'Marca:'); ?>
                            <?= h($ticket->marca) ?>
                        </td></tr>
                        <tr><td>
                            <?php echo $this->Form->label($ticket->modelo, 'Modelo:'); ?>
                            <?= h($ticket->modelo) ?>
                        </td></tr>
                        <tr><td>
                            <?php echo $this->Form->label($ticket->serie, 'Número Serie:'); ?>
                            <?= h($ticket->serie) ?>
                        </td></tr>
                        <tr><td>
                            <?php if ($ticket->placa_universitaria !=null){?>
                                <?php echo $this->Form->label($ticket->placa_universitaria, 'Número de Placa:'); ?>
                                <?= h($ticket->placa_universitaria) ?>
                                <br />
                            <?php }?>
                        </td></tr>
                        <tr><td>
                            <?php echo $this->Form->label($ticket->id, 'Número de Boleta:'); ?>
                            <?= h($ticket->id) ?>
                        </td></tr>
                        <br/>
                    </table>
  </div>
</div>
        
    </div>
</div>
</div>