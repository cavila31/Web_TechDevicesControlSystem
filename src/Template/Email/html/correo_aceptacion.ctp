<p>Saludos <?php echo $user->nombre; ?>,</p>

<p>Se le informa que su boleta de solicitud para ingreso del equipo: <?php echo $ticket->modelo; ?>, <?php echo $ticket->marca; ?> ha sido aceptada.</p>

<p>En el siguiente enlace puede acceder a la boleta, e imprimir el código QR para ingresar con el equipo: </p>
<p><a href="<?php echo $this->Url->build('/tickets/', true);?>"><?php echo $this->Url->build('/tickets/', true);?></a></p>

<p>Cordialmente,</p>
<p>Escuela de Computación e Informática, UCR</p>
<p>Este mensaje es autogenerado. Favor no responder.</p>