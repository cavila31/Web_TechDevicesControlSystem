<p>Saludos <?php echo $user->nombre; ?>,</p>

<p>Se le informa que su boleta de solicitud para ingreso del equipo: <?php echo $ticket->modelo; ?>, <?php echo $ticket->marca; ?> ha sido denegada.</p>
<?php if ($mensaje != null){?>
    <p>Razón por el rechazo de solicitud:<br />
    <?php echo $mensaje;?></p>
<?php }?>
<p>Si desea más información, por favor contacte la secretaría de la Escuela de Computación e Informática.</p>
<p>Cordialmente,</p>
<p>Escuela de Computación e Informática, UCR</p>
<p>Este mensaje es autogenerado. Favor no responder.</p>
