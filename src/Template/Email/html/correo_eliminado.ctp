<p>Saludos <?php echo $user->nombre; ?>,</p>

<p>Se le informa que su boleta para ingreso del equipo: <?php echo $ticket->modelo; ?>, <?php echo $ticket->marca; ?> ha sido eliminada del sistema.</p>

<p>Si desea volver a crear una solicitud para ese equipo, el siguiente enlace le permitirá hacerlo: </p>
<p><a href="<?php echo $this->Url->build('/tickets/add', true);?>"><?php echo $this->Url->build('/tickets/add', true);?></a></p>

<p>Cordialmente,</p>
<p>Escuela de Computación e Informática, UCR</p>
<p>Este mensaje es autogenerado. Favor no responder.</p>