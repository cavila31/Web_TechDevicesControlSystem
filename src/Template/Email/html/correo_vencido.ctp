<p>Saludos <?php echo $user->nombre; ?>,</p>

<p>Se le informa que su boleta para ingreso del equipo: <?php echo $ticket->modelo; ?>, <?php echo $ticket->marca; ?> ha expirado.</p>

<p>Usted cuenta con 7 días naturales para renovar dicha boleta antes de que sea eliminada por el sistema. El siguiente enlace le permitirá renovar la boleta: </p>
<p><a href="<?php echo $this->Url->build('/tickets/', true);?>"><?php echo $this->Url->build('/tickets/', true);?></a></p>

<p>Cordialmente,</p>
<p>Escuela de Computación e Informática, UCR</p>
<p>Este mensaje es autogenerado. Favor no responder.</p>