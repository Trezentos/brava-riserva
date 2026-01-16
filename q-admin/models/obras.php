<?php 

$__TABLE__ 	 	 = 'CONFIG';
$__TABLE__IMG    = 'EMPREENDIMENTOS_IMG';


# HEADERS
$_header['titulo'] 	= 'Obras';
$_header['icon'] 	= 'building-o';





# SET ID
if ($_POST['id']) {
	$id = $_POST['id'];
} else {
	$id = $_REQUEST['id'];
}

$id = 1;






if ($_POST && isset($_POST['submit']))
{



	# PREPARE DATA

	$array_data = [
		'escavacao' 		 => $_POST['escavacao'],
		'fundacao' 			 => $_POST['fundacao'],
		'estrutura' 		 => $_POST['estrutura'],
		'alvenaria' 		 => $_POST['alvenaria'],
		'acabamento_externo' => $_POST['acabamento_externo'],
		'acabamento_interno' => $_POST['acabamento_interno'],
		'total' 			 => $_POST['total'],
		'atualizacao_obras'  => $_POST['atualizacao_obras'],
	];





	switch($_POST['action'])
	{
		case 'alterar':
			
			$update = $db->update($tables[$__TABLE__], $array_data, ['id'=>$id]);

			$alertSuccess 	= true;
			$alertMessage 	= 'Registro salvo com sucesso!';

		break;
	}
}











if($id) {
	$q = $db->get_row("SELECT * FROM ".$tables[$__TABLE__]." WHERE id='{$id}'");
}


if($_GET['del']=='ok') {
	$alertSuccess = true;
	$alertMessage = 'Registro excluído com sucesso!';
}


# ITENS FOR 'ESTAGIO DA OBRA'

$aEstagiosObra = [
	'escavacao' 			=> 'Escavação',
	'fundacao' 				=> 'Fundação',
	'estrutura' 			=> 'Estrutura',
	'alvenaria' 			=> 'Alvenaria',
	'acabamento_externo' 	=> 'Acabamento Externo',
	'acabamento_interno' 	=> 'Acabamento Interno',
	// 'total' 				=> 'Total',
];
