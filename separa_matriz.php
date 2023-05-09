<?php
	session_start();
	$arquivo = fopen('arquivo.hd', 'r');

	$matrizes = array();
	$novaMatriz = array();
	$linha = 0;

	while(!feof($arquivo)){

		$registro = fgets($arquivo);
		$registro_detalhes = explode('-', $registro);
		$itens = count($registro_detalhes);
		$controlador = ($itens/2)-1;

		if($linha>0){

			$novaMatriz = array ();
			for($j = 0; $j < $itens; $j++){
				$novaMatriz[$j] = array ();
				for($k = 0; $k < $controlador; $k++){
					$novaMatriz[$j][$k] = 0;
				}
			}

			for($i = 0; $i < $itens; $i++){
				$valores = explode(',',$registro_detalhes[$i]);
				for($j = 0; $j < $itens; $j++){
					if(isset($valores[$j])){
						echo "<pre>";
						print_r($novaMatriz[$i][$j] = $valores[$j]);
						echo "</pre>";

					}
				}
				
			}
			echo "<pre>";
			(array_push($matrizes, $novaMatriz));
			($matrizes);
			echo "</pre>";

		}
		$linha++;
		$controlador2=0;

		for ($i=0; $i < count($matrizes); $i++) { 
			# code...
			for ($j=0; $j < count($matrizes[$i]) ; $j++) { 
				$controlador2++;

				if($j>1){
					echo "teste  ";
				}
			}
		}
		 
	}

	fclose($arquivo);
?>