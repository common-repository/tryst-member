<div class="container my-4">
	<div class="row">
		<div class="col-md-8">			
			<ul class="list-group">
				<li class="list-group-item"><a href="<?php echo site_url().'/tryst-meetings-list?tryst_member_hash='.$member->getFormKey(); ?>">Consultar agendamento</a></li>
			</ul>
		</div>
		<?php if(!is_user_logged_in()): ?>
		<div class="col-md-4">
			<form name="loginform" id="loginform" action="<?php echo site_url(); ?>/wp-login.php" method="post">
				<p>
					<label for="user_login">Nome de usuário ou endereço de e-mail<br>
						<input type="text" name="log" id="user_login" aria-describedby="login_error" class="input" value="" size="20"></label>
					</p>
					<p>
						<label for="user_pass">Senha<br>
							<input type="password" name="pwd" id="user_pass" aria-describedby="login_error" class="input" value="" size="20"></label>
						</p>
						<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Lembrar-me</label></p>
						<p class="submit">
							<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Acessar">
							<input type="hidden" name="redirect_to" value="<?php echo get_option('tryst_member_option')['member_index']; ?>">
							<input type="hidden" name="testcookie" value="1">
						</p>
					</form>
					<p id="nav">
						<a href="<?php echo site_url(); ?>/wp-login.php?action=lostpassword">Perdeu a senha?</a>
					</p>
					<script type="text/javascript">
						function wp_attempt_focus(){
							setTimeout( function(){ try{
								d = document.getElementById('user_login');
								d.focus();
								d.select();
							} catch(e){}
						}, 200);
					}
					wp_attempt_focus();
					if(typeof wpOnload=='function')wpOnload();
				</script>
				<p id="backtoblog"><a href="<?php echo site_url(); ?>">Home</a></p>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>