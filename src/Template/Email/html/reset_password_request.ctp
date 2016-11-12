<p>Saludos <?php echo $user->nombre; ?>,</p>

<p>Hemos recibido una solicitud para cambio de contraseña de su cuenta. Usted puede cambiar su contraseña siguiendo el enlace a continuación:</p>
<p><a href="<?php echo $this->Url->build('/users/resetpasswordtoken/' . $user->reset_password_token, true);?>"><?php echo $this->Url->build('/users/reset_password_token/' . $user->reset_password_token, true);?></a></p>

<p>El enlace anterior tiene validez por 24 horas.</p>
<p>Cordialmente,</p>
<p>Escuela de Computación e Informática, UCR</p>
<p>Este mensaje es autogenerado. Favor no responder.</p>