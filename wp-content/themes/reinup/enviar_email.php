<?php 
die('###');
require 'PHPMailer/PHPMailerAutoload.php';

$Mailer = new PHPMailer();

// Define que será usado SMTP
$Mailer->IsSMTP();

//enviar email em html
$Mailer->isHTML(true);
//Aceita caracters especiais

$Mailer->Charset='UTF-8';

//Configurações
$Mailer->SMTPAuth = true;
$Mailer->SMTPSecure = 'ssl';

//Nome do servidor host e porta
$Mailer->'brl60'
$Mailer->Port =465;


// autenticação email
$Mailer->Username = '';
$Mailer->Password = '';

//E-mail rementente

$Mailer->From = '';

//nome do remetente
$Mailer->FromName = 'Nome da pessoa';

//Assunto da mensagem
$Mailer->Subject = 'titulo da mensagem';

//Corpo da mensagem
$Mailer->Body = 'Conteudo do email';

//Corpo da mensagem em Texto
$Mailer->AltBody ='conteudo do email em texto'

if($Mailer->Send()){
	echo 'E-mail enviado com Sucesso!!';
}else{
	echo 'Erro ao enviar email!'. $Mailer->ErrorInfo;;
}
?>