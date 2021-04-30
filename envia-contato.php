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
					[Contato] - Site '.$nameSindicato.'
				</td>
			</tr>
			<tr><td colspan="2" height="40px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Nome:
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
					E-mail:
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
					Assunto:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:bold; font-size:14px; line-height:20px; color:#2e2e2e;">
						'.$_POST['assunto'].'
					</div>
				</td>
			</tr>
			<tr><td colspan="2" height="2px"></td></tr>
			<tr>
				<td bgcolor="#f2f2f2" width="190" valign="middle" align="right" style="padding-right:15px; padding-top:15px; padding-bottom:15px; font-family:Tahoma; font-weight:bold; font-size:16px; color:#000;">
					Mensagem:
				</td>
				<td valign="middle" align="left" style="padding-left:30px; padding-right:15px; padding-top:15px; padding-bottom:15px; border-width:1px; border-bottom-style:solid; border-color:#f2f2f2; ">
					<div style="font-family:Tahoma; font-weight:normal; font-size:14px; line-height:20px; color:#2e2e2e;">
						<p>'.nl2br($_POST['mensagem']).'</p>
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