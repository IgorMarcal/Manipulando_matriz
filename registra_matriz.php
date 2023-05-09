<!DOCTYPE html>
<html>
	<head>
	</head>

	<body>

	</body>

<?php
	
	session_start();

	//montagem do texto
	$matriz1 = str_replace(';', '-', $_GET['matriz1'] );
	$matriz2 = str_replace(';', '-', $_GET['matriz2'] );
	$operacao = str_replace(';', '-', $_GET['operacao'] );

	if ($_GET['matriz1'] == null || $_GET['matriz2']== null) {
		header('Location: index.php?error');
	}else{
		$texto = $operacao . PHP_EOL;
		$texto = $texto . $matriz1 . '-'  .$matriz2 . PHP_EOL;

		if(!file_exists('arquivo.hd')){
			//abrindo o arquivo 
			$arquivo = fopen('arquivo.hd', 'a+');
			//escrevendo no arquivo
			fwrite($arquivo, $texto);

			//fechando o arquivo
			fclose($arquivo);
			header('Location: manipulando_matriz.php');	
		}else{
			unlink('arquivo.hd');
			//abrindo o arquivo 
			$arquivo = fopen('arquivo.hd', 'a+');
			//escrevendo no arquivo
			fwrite($arquivo, $texto);

			//fechando o arquivo
			fclose($arquivo);
			header('Location: manipulando_matriz.php');
		}
	}	
?>

</html>