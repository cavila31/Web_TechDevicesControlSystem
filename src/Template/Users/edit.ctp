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
          <?= $this->Form->input('username', ['label' => false , 'class' => 'form-control', 'default'=>$correo]); ?>          
          </div>

          <br/><br/><br/>
    
          <label for="inputId" class="col-lg-2 control-label">Nombre: </label>
          <div class="col-lg-8">
          <?= $this->Form->input('nombre', ['label' => false , 'class' => 'form-control', 'default'=>$nomb]); ?>          
          </div>
          <br/><br/><br/>
          
          <label for="inputId" class="col-lg-2 control-label">Cédula: </label>
          <div class="col-lg-6">
          <?= h($user->cedula) ?>          
          </div>
          <br/><br/><br/>
          
                      <?php if ($user->role == 'Estudiante'){?> 
                        <div class="input-group">
                        	<span class="input-group-btn">
                        	<label class="btn btn-primary btn-file btn-sm" for="foto_id">
                        		<div class="input required">
                        			<?php echo $this->Form->input('foto_id',['type'=>'file', 'label'=>'Foto Cedula']); ?>
                        		</div>
                        	</label>
                        	</span>
                        	<span class="file-input-label"></span>
                        </div>     
                        <?php }?>
                        
        </fieldset>

  </div>
  <div class="panel-footer">     
  
      <?php echo $this->Form->button('Aceptar', ['type' => 'submit', 'class' => 'btn btn-success btn-sm', 'name'=>'Aceptar']);?>
      <?php echo $this->Form->button('Cancelar', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'name'=>'Cancelar']);?>

    <?= $this->Form->end() ?>
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