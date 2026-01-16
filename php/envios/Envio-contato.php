<?php
include '../config.php';

foreach($_POST as $key => $value)
{
	if( !is_array($value) ) $_POST[$key] = antiSQL($value);
}


$msg_ok    = "Mensagem enviada com sucesso!";
$msg_erro  = "Ops! Ocorreu um erro. Por favor tente novamente!";
$msg_todos = "Preencha todos os campos!";


if ( $_POST )
{
	if ( $_POST["nome"] != "" && 
		 $_POST["telefone"] != "" && 
		 $_POST["email"] != "" 
		)
	{



		// $array_data = [
		// 	'titulo' 	 	=> $_POST['nome'],
		// 	'telefone' 	 	=> $_POST['telefone'],
		// 	'email' 		=> $_POST['email'],
		// ];

		// $insert = $db->insert($tables['CADASTRO'], $array_data);



		// E-MAIL PARA O ADMINISTRADOR

		$assunto  = EMPRESA." - Interesse";
		$mensagem = '<h3>'.EMPRESA.' - Interesse</h3>
					<br>
					<strong>Nome</strong>: '.$_POST["nome"].'<br><br>
					<strong>E-mail</strong>: '.$_POST["email"].'<br><br>
					<strong>Telefone</strong>: '.$_POST["telefone"].'<br><br>				
					';

		$enviado = SendMailAdm($assunto, $mensagem, $_POST["email"]);

		/* ==================================================================== */

		if ($enviado) {
			echo json_encode(['status'=>'1', 'message'=>$msg_ok]);
		} else {
			echo json_encode(['status'=>'0', 'message'=>$msg_erro]);
		}
	} else {
		echo json_encode(['status'=>'0', 'message'=>$msg_todos]);
	}
}