<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Event\Event;

$this->assign('title', 'Crear Cuenta');
?>

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
                <h2>Crear Cuenta</h2>
                <hr class="star-primary">
            </div> 
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="users form">
                <?= $this->Form->create($user, ['type' => 'file']) ?>
                    
                    <fieldset>
                        <div>
                            
                        <label class="col-lg-2 control-label">Nombre completo:* </label>
                        <div class="col-lg-4">
                        <?php echo $this->Form->text('nombre', ['class' => 'form-control']); ?>
                        </div>
                        <label class="col-lg-2 control-label">C&eacute;dula:* </label>
                        <div class="col-lg-4">
                        <?php echo $this->Form->text('cedula', ['class' => 'form-control']);?>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <label class="col-lg-2 control-label">Correo:* </label>
                        <div class="col-lg-4">
                        <?php echo $this->Form->username('username', ['class' => 'form-control']); ?>
                        <p class="text-muted"><small>Debe ser un correo en el dominio ucr.ac.cr</small></p>
                        </div>
                        <label class="col-lg-2 control-label">Contrase&ntilde;a:* </label>
                        <div class="col-lg-4">
                        <?php echo $this->Form->password('password', ['class' => 'form-control']);?>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <label class="col-lg-2 control-label">Subir Foto:* </label>
                        <div class="col-lg-10">
                        <div class="input-group" >
                        	<span class="input-group-btn">
                        	<label class="btn btn-primary btn-file" for="foto_id">
                        		<div class="input required">
                        			<?php echo $this->Form->input('foto_id',['type'=>'file', 'label'=>'Foto Cedula']); ?>
                        		</div>
                        	</label>
                        	</span>
                        	<span class="file-input-label"></span>
                        </div>
                        <p class="text-muted"><small>Se requiere una foto del lado frontal de su cédula, recortada a la medida (sin fondo extra).</small></p>
                        </div>                
                    </fieldset>
                    <br/>
                <?php echo $this->Form->button('Crear Cuenta Nueva', ['type' => 'submit', 'class' => 'btn btn-success btn-lg btn-block']);?>
                <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script('jquery');?>


<script>
jQuery.noConflict();
 
(function( $ ) {
     $(document).on('change', '.btn-file :file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });
})( jQuery );




(function( $ ) {
        $(document).ready( function() {
    	$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
    		console.log("teste");
    		var input_label = $(this).closest('.input-group').find('.file-input-label'),
    			log = numFiles > 1 ? numFiles + ' files selected' : label;
    
    		if( input_label.length ) {
    			input_label.text(log);
    		} else {
    			if( log ) alert(log);
    		}
    	});
    });
})( jQuery );
</script>