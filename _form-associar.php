<form method="post" action="#" id="formContato" data-action="<?php echo get_template_directory_uri().'/envia-associar.php'; ?>" class="formulariosDefault">
	<input type="text" name="email_admin" hidden="hidden" value="<?php the_field('email_admin','options'); ?>">
	<input type="text" name="name_sindicato" hidden="hidden" value="<?php bloginfo( 'name' ); ?>">
	<fieldset>
		<div class="input small left">
			<label for="razao">*Razão social</label>
			<input type="text" name="razao" id="razao" required="required">
		</div>
		<div class="input small left">
			<label for="cnpj">*CNPJ</label>
			<input type="text" name="cnpj" id="cnpj" required="required" class="mask-cnpj">
		</div>
		<div class="input small right">
			<label for="cnae">*CNAE principal</label>
			<input type="text" name="cnae" id="cnae" required="required">
		</div>
		

		<div class="input half left">
			<label for="nome">*Nome do solicitante</label>
			<input type="text" name="nome" id="nome" required="required">
		</div>
		<div class="input half right">
			<label for="email">*E-mail do solicitante</label>
			<input type="email" name="email" id="email" required="required">
		</div>


		<div class="input half left">
			<label for="tel">*Telefone comercial</label>
			<input type="text" name="tel" id="tel" required="required" class="mask-tel">
		</div>
		<div class="input half right">
			<label for="cel">*Telefone celular</label>
			<input type="text" name="cel" id="cel" required="required" class="mask-tel">
		</div>
		

		<div class="input full spaced">
			<label>Qual é o seu interesse sobre os benefícios oferecidos pelo SINPAPEL às empresas associadas?</label>
		</div>

		<div class="input full vfb-fieldType-radio">
			<label for="vfb-field-27" class="vfb-control-label">Representatividade empresarial <span class="vfb-required-asterisk">*</span></label>
			<div>
				<div class="vfb-radio">
					<label>
						<input id="vfb-field-27-0" class="" placeholder="" required="required" name="vfb-field-27" value="Muito Interessado" type="radio">
						Muito Interessado
					</label>
				</div>
				<div class="vfb-radio">
					<label>
						<input id="vfb-field-27-1" class="" placeholder="" required="required" name="vfb-field-27" value="Interessado" type="radio">
						Interessado
					</label>
				</div>
				<div class="vfb-radio">
					<label>
						<input id="vfb-field-27-2" class="" placeholder="" required="required" name="vfb-field-27" value="Indiferente" type="radio">
						Indiferente
					</label>
				</div>
				<div class="vfb-radio">
					<label>
						<input id="vfb-field-27-3" class="" placeholder="" required="required" name="vfb-field-27" value="Sem interesse" type="radio">
						Sem interesse
					</label>
				</div>
			</div>
		</div>

		<div class="input full vfb-fieldType-radio"><label for="vfb-field-34" class="vfb-control-label">Oportunidade de negócios <span class="vfb-required-asterisk">*</span></label><div><div class="vfb-radio"><label><input id="vfb-field-34-0" class="" placeholder="" required="required" type="radio" name="vfb-field-34" value="Muito Interessado">Muito Interessado</label></div><div class="vfb-radio"><label><input id="vfb-field-34-1" class="" placeholder="" required="required" type="radio" name="vfb-field-34" value="Interessado">Interessado</label></div><div class="vfb-radio"><label><input id="vfb-field-34-2" class="" placeholder="" required="required" type="radio" name="vfb-field-34" value="Indiferente">Indiferente</label></div><div class="vfb-radio"><label><input id="vfb-field-34-3" class="" placeholder="" required="required" type="radio" name="vfb-field-34" value="Sem interesse">Sem interesse</label></div></div></div>

		<div class="input full vfb-fieldType-radio"><label for="vfb-field-33" class="vfb-control-label">Capacitação e conhecimento <span class="vfb-required-asterisk">*</span></label><div><div class="vfb-radio"><label><input id="vfb-field-33-0" class="" placeholder="" required="required" type="radio" name="vfb-field-33" value="Muito Interessado">Muito Interessado</label></div><div class="vfb-radio"><label><input id="vfb-field-33-1" class="" placeholder="" required="required" type="radio" name="vfb-field-33" value="Interessado">Interessado</label></div><div class="vfb-radio"><label><input id="vfb-field-33-2" class="" placeholder="" required="required" type="radio" name="vfb-field-33" value="Indiferente">Indiferente</label></div><div class="vfb-radio"><label><input id="vfb-field-33-3" class="" placeholder="" required="required" type="radio" name="vfb-field-33" value="Sem interesse">Sem interesse</label></div></div></div>

		<div class="input full vfb-fieldType-radio"><label for="vfb-field-32" class="vfb-control-label">Assessoria jurídica <span class="vfb-required-asterisk">*</span></label><div><div class="vfb-radio"><label><input id="vfb-field-32-0" class="" placeholder="" required="required" type="radio" name="vfb-field-32" value="Muito Interessado">Muito Interessado</label></div><div class="vfb-radio"><label><input id="vfb-field-32-1" class="" placeholder="" required="required" type="radio" name="vfb-field-32" value="Interessado">Interessado</label></div><div class="vfb-radio"><label><input id="vfb-field-32-2" class="" placeholder="" required="required" type="radio" name="vfb-field-32" value="Indiferente">Indiferente</label></div><div class="vfb-radio"><label><input id="vfb-field-32-3" class="" placeholder="" required="required" type="radio" name="vfb-field-32" value="Sem interesse">Sem interesse</label></div></div></div>

		<div class="input full vfb-fieldType-radio"><label for="vfb-field-31" class="vfb-control-label">Convênios <span class="vfb-required-asterisk">*</span></label><div><div class="vfb-radio"><label><input id="vfb-field-31-0" class="" placeholder="" required="required" type="radio" name="vfb-field-31" value="Muito Interessado">Muito Interessado</label></div><div class="vfb-radio"><label><input id="vfb-field-31-1" class="" placeholder="" required="required" type="radio" name="vfb-field-31" value="Interessado">Interessado</label></div><div class="vfb-radio"><label><input id="vfb-field-31-2" class="" placeholder="" required="required" type="radio" name="vfb-field-31" value="Indiferente">Indiferente</label></div><div class="vfb-radio"><label><input id="vfb-field-31-3" class="" placeholder="" required="required" type="radio" name="vfb-field-31" value="Sem interesse">Sem interesse</label></div></div></div>

		<div class="input full vfb-fieldType-radio"><label for="vfb-field-30" class="vfb-control-label">Serviços para saúde e qualidade de vida <span class="vfb-required-asterisk">*</span></label><div><div class="vfb-radio"><label><input id="vfb-field-30-0" class="" placeholder="" required="required" type="radio" name="vfb-field-30" value="Muito Interessado">Muito Interessado</label></div><div class="vfb-radio"><label><input id="vfb-field-30-1" class="" placeholder="" required="required" type="radio" name="vfb-field-30" value="Interessado">Interessado</label></div><div class="vfb-radio"><label><input id="vfb-field-30-2" class="" placeholder="" required="required" type="radio" name="vfb-field-30" value="Indiferente">Indiferente</label></div><div class="vfb-radio"><label><input id="vfb-field-30-3" class="" placeholder="" required="required" type="radio" name="vfb-field-30" value="Sem interesse">Sem interesse</label></div></div></div>

		
		<div class="input full spaced">
			<label for="beneficios">Além dos benefícios acima, você possui outro interesse para associar sua empresa ao sindicato?</label>
			<textarea name="beneficios" id="beneficios"></textarea>
		</div>

		<div class="submit"></div>
	</fieldset>
</form>