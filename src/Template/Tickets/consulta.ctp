<?php
$this->assign('title', 'Consulta Boleta');
?>


<div class="row">
        <div class="row">
            <div class="col-md-4">
                <?= $this->Flash->render() ?>
            </div>
        </div>
    <div class="tickets index large-9 medium-8 columns content">
        <div class="col-lg-12 text-center">
            <h2>Consulta Boleta</h2>
            <hr class="star-primary">
        </div> 
    </div>
</div>

<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="users form">
                <?= $this->Form->create() ?>
                    <fieldset>
                        <label>Número de la Boleta: </label>
                        <?= $this->Form->input('id', ['class' => 'form-control', 'label'=>'']); ?>
                    </fieldset>
                    <br/>
                <?php echo $this->Form->button('Consultar Boleta', ['type' => 'submit', 'class' => 'btn btn-success btn-lg btn-block']);?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

