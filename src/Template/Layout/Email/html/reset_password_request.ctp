<p>Dear <?php echo $User->nombre; ?>,</p>

<p>You may change your password using the link below.</p>
<p><?php echo $this->Url->build('/users/reset_password_token/' . $User->reset_password_token, true);
?></p>

<p>Your password won't change until you access the link above and create a new one.</p>
<p>Thanks and have a nice day!</p>
