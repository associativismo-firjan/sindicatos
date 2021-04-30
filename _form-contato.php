<form method="post" action="#" id="formContato" data-action="<?php echo get_template_directory_uri().'/envia-contato.php'; ?>" class="formulariosDefault">
	<input type="text" name="email_admin" hidden="hidden" value="<?php the_field('email_admin','options'); ?>">
	<input type="text" name="name_sindicato" hidden="hidden" value="<?php bloginfo( 'name' ); ?>">
	<fieldset>
		<div class="input half left">
			<label for="nome">*Nome</label>
			<input type="text" name="nome" id="nome" required="required">
		</div>
		<div class="input half right">
			<label for="email">*E-mail</label>
			<input type="email" name="email" id="email" required="required">
		</div>
		<div class="input full">
			<label for="assunto">*Assunto</label>
			<input type="text" name="assunto" id="assunto" required="required">
		</div>
		<div class="input full">
			<label for="mensagem">*Mensagem</label>
			<textarea name="mensagem" id="mensagem" required="required"></textarea>
		</div>
		<div class="submit"></div>
	</fieldset>
</form>