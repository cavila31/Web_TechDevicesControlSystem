<?php
$this->assign('title', 'Nueva Boleta');
?>

<div class="row">
        <div class="row">
            <div class="col-md-4">
                <?= $this->Flash->render() ?>
            </div>
        </div>
    <div class="tickets index large-9 medium-8 columns content">
        <div class="col-lg-12 text-center">
            <h2>Nueva Solicitud</h2>
            <hr class="star-primary">
        </div> 
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="users form">
                    <?= $this->Form->create($ticket) ?>
                    <fieldset>
                        <label class="col-lg-2 control-label">Tipo de Activo:* </label>
                        <div class="col-lg-4">
                        <?php     echo $this->Form->select(
                                'tipo_activo',
                                ['Computadora','Disco Duro','Impresora','CPU','Monitor','Video Beam','Servidor','Tableta', 'Otro'],
                                ['empty' => 'Seleccionar', 'class' => 'form-control']);?>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <label class="col-lg-2 control-label">Modelo:* </label>
                        <div class="col-lg-4">
                        <?php     echo $this->Form->input('modelo', ['label' => false , 'class' => 'form-control']);?>
                        </div>
                        <label class="col-lg-2 control-label">Número de Serie:* </label>
                        <div class="col-lg-4">
                        <?php     echo $this->Form->input('serie', ['label' => false , 'class' => 'form-control']);?>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <label class="col-lg-2 control-label">Marca:* </label>
                        <div class="col-lg-4">
                        <?php     echo $this->Form->input('marca', ['label' => false , 'class' => 'form-control']);?>
                        </div>
                        <label class="col-lg-2 control-label">Placa Universitaria: </label>
                        <div class="col-lg-4">
                        <?php     echo $this->Form->input('placa_universitaria', ['label' => false , 'class' => 'form-control']);?>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <label class="col-lg-2 control-label">Observaciones: </label>
                        <div class="col-lg-10">    
                        <?php     echo $this->Form->textarea('observaciones', array('label' => false , 'class' => 'form-control'));?>
                        </div>
                    </fieldset>
                    <br/>
                    
                    <?php echo $this->Form->button('Solicitar Boleta', ['type' => 'submit', 'class' => 'btn btn-success btn-lg btn-block']);?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>