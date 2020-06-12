<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="login-form">
	
<h3>Tela de Login</h3>

<?php get_msg('msgerro'); ?>

	<form action="" class="" name="form-login" id="form-login" method="post">

		<input type="email" name="login_email" value="" class="input-sistema" autocomplete="off" placeholder="E-mail" required >

		<input type="password" name="login_senha" value="" class="input-sistema" autocomplete="off" placeholder="Senha" required >

		<button form="form-login" type="submit" class="btn btn-success btn-lg btn-block">Entrar</button>

	</form>

</div>