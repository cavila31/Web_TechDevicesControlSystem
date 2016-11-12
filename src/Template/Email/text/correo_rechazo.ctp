<p>Saludos,</p>

<p>Su Solicitud por permiso de ingreso y salida de Equipo electrónico, de la Escuela de Ciencias de la Computación e Informática, ha sido denegada.</p>
<br />
<?php if ($mensaje != null){?>
    <p>Razón por el rechazo de solicitud:</p>
    <p><?php echo $mensaje;?></p>
<?php }?>


<br />
<br />
<p>En este link se encuentra la información de su solicitud:</p>
<p><?php echo $this->Url->build('/tickets/view/' . $ticket->id, true);?></p>

<p>Gracias por su atención</p>
