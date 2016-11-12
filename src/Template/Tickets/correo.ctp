<?php
$this->assign('title', 'Consulta Boleta');
?>
<div class="col-lg-12 text-center">
    <h2>Rechazo de la Boleta</h2>
    <hr class="star-primary">
</div>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Puede detallar en un correo la explicación del rechazo</div>
        <div class="panel-body">
            <div class="users form">
                <?= $this->Form->create() ?>
                    <fieldset>
                        <label>Contenido del correo: </label>
                        <?php echo $this->Form->textarea('contenido_correo', ['class' => 'form-control', 'label'=>'','style' => 'height: 80px;']);?>
                    </fieldset>
                    <br/>
                <?php echo $this->Form->button('Rechazar Solicitud', ['type' => 'submit', 'class' => 'btn btn-success btn-block']);?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

