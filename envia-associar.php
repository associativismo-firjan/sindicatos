<?php

$emailsender = $_POST['email_admin'];
$nameSindicato = $_POST['name_sindicato'];
$redirect = '/sucesso';

/* Verifica qual éo sistema operacional do servidor para ajustar o cabeçalho de forma correta.  */
if(PATH_SEPARATOR == ";") $quebra_linha = "\r\n"; //Se for Windows
else $quebra_linha = "\n"; //Se "não for Windows"

 
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$emaildestinatario = $_POST['email_admin'];
$nomeremetente     = $_POST['nome'];
$emailremetente    = $_POST['email'];
$assunto           = '[Contato] - Site '.$nameSindicato;

$mensagemHTML = '
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<thead>
			<tr>
				<td height="50px" valign="middle" colspan="2" style="padding-left:20px; border-width:10px; border-left-style:solid; border-color:#ffcd06; font-family:Tahoma; font-weight:bold; font-size:30px; color:#000;">
					[ASSOCIAR] - Solicitação de associação pelo site '.$nameSindicato.'
				</td>
			</tr>
			<tr><td colspan="2" height="40px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Razão social:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['razao'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					CNPJ:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['cnpj'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					CNAE principal:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['cnae'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Nome do solicitante:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['nome'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					E-mail do solicitante:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['email'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Telefone comercial:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['tel'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Telefone celular:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['cel'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Representatividade empresarial:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['vfb-field-27'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Oportunidade de negócios:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['vfb-field-34'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Capacitação e conhecimento:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['vfb-field-33'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Assessoria jurídica:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['vfb-field-32'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Convênios:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['vfb-field-31'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Serviços para saúde e qualidade de vida:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['vfb-field-30'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Além dos benefícios acima, você possui outro interesse para associar sua empresa ao sindicato?
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:normal; font-size:14px; line-height:20px; color:#2e2e2e;">
						<p>'.nl2br($_POST['beneficios']).'</p>
					</div>
				</td>
			</tr>
		</thead>
	</table>
';
/*
 
/* Montando o cabeçalho da mensagem */

$headers = "MIME-Version: 1.1" .$quebra_linha;
$headers .= "Content-type: text/html; charset=utf-8" .$quebra_linha;

// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
$headers .= "From: " . $emailsender.$quebra_linha;
$headers .= "Reply-To: " . $emailremetente . $quebra_linha;
// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
 
/* Enviando a mensagem */

//É obrigatório o uso do parâmetro -r (concatenação do "From na linha de envio"), aqui na Locaweb:
if(!mail($emaildestinatario, $assunto, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
    $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
    mail($emaildestinatario, $assunto, $mensagemHTML, $headers );
}

header("location:$redirect"); 
 
?>