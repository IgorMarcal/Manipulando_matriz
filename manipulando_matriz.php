<?php
	session_start();
	/**
	 * 
	 */

	
	class Matriz{

		public function somaMatriz($matriz1,$matriz2){

			$numRowsM1 = count($matriz1);
		    $numColsM1 = count($matriz1[0]);
		    $numRowsM2 = count($matriz2);
		    $numColsM2 = count($matriz2[0]);

		    if($numRowsM1 == $numColsM2 && $numColsM1 == $numColsM2){
		    	$matriz3 = array ();

				for ($i=0; $i < $numRowsM1; $i++) { 
					# code...
					for ($j=0; $j < $numColsM1 ; $j++) { 
						# code...
						$matriz3[$i][$j] = 0;
					}
					
				}

				for ($i=0; $i < count($matriz1); $i++) { 
					# code...
					for ($j=0; $j < count($matriz2) ; $j++) { 
						# code...
						echo $resultMatriz[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j];
						echo "  ";
						
					}
					echo "</br>";
				}

		    }else{
		    	echo "Matrizes de ordens diferentes<br/>";
		    }

			

		}

		public function subtraiMatriz($matriz1,$matriz2){

			$numRowsM1 = count($matriz1);
		    $numColsM1 = count($matriz1[0]);
		    $numRowsM2 = count($matriz2);
		    $numColsM2 = count($matriz2[0]);

		    if($numRowsM1 == $numRowsM2 && $numColsM1 == $numColsM2){
		    	$matriz3 = array ();

				for ($i=0; $i < $numRowsM1; $i++) { 
					# code...
					for ($j=0; $j < $numColsM1 ; $j++) { 
						# code...
						$matriz3[$i][$j] = 0;
					}
					
				}

				for ($i=0; $i < count($matriz1); $i++) { 
					# code...
					for ($j=0; $j < count($matriz2) ; $j++) { 
						# code...
						echo $resultMatriz[$i][$j] = $matriz1[$i][$j] - $matriz2[$i][$j];
						echo "  ";
						
					}
					echo "</br>";
				}

		    }else{
		    	echo "Matrizes de ordens diferentes<br/>";
		    }

		}

		public function multiplicaMatriz($matriz1,$matriz2){


			$tamM1i = count($matriz1);;
			$tamM2x = count($matriz2[0]);

			$matriz3 = array ();

			for ($i=0; $i < $tamM1i; $i++) { 
				# code...
				for ($j=0; $j < $tamM2x ; $j++) { 
					# code...
					$matriz3[$i][$j] = 0;
				}
				
			}
			
			if($tamM1i==$tamM2x){
				for ($i=0; $i < $tamM1i; $i++) { 
					for ($j=0; $j < $tamM2x ; $j++) { 
						for ($k=0; $k < count($matriz1[0]) ; $k++) { 					
							$matriz3[$i][$j] += ( $matriz1[$i][$k] * $matriz2[$k][$j]);
						}
						echo $matriz3[$i][$j] . " ";

					}
					echo "</br>";
				}
				
			}	
		}

		public function trataOperacao($matriz1,$matriz2){

			$arquivo = fopen('arquivo.hd', 'r');
			while (!feof($arquivo)) {
		
				$linha = fgets($arquivo, 4096); // le 4096bytes ou ate o final da l
				( $operacao = file_get_contents('arquivo.hd', false, null, 0, 3));
				if($operacao == 'Sub'){
					return $this->subtraiMatriz($matriz1,$matriz2);
				}else if($operacao == 'Adi'){
					return $this->somaMatriz($matriz1,$matriz2);
				}else if($operacao == 'Mul'){
					return $this->multiplicaMatriz($matriz1,$matriz2);
				}else{
					echo "Operação inválida";
				}

			}

			fclose($arquivo);
			
		}

	}

	$a = new Matriz();

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
						($novaMatriz[$i][$j] = $valores[$j]);
						echo "</pre>";

					}
				}	
			}
			
			echo "<pre>";
			(array_push($matrizes, $novaMatriz));
			echo "</pre>";

		}
		$linha++;
		$controlador2=0;
		for ($i=0; $i < count($matrizes); $i++) { 
			# code...

			for ($j=0; $j < count($matrizes[$i]) ; $j++) { 
				$controlador2++;
				

				for($k = 0; $k < $controlador; $k++){
					if($j<=1){
						echo "<pre>";
						($m1[$j][$k] = $matrizes[$i][$j]);
						echo "</pre>";


					}else if($j>1){
						echo "<pre>";
						($m2[$i][$j] = $matrizes[$i][$j]);
						echo "</pre>";
					}
				}
			}
		}
	}

	$matriz1_corr = array();
	for ($i=0; $i < count($m1); $i++) { 
		# code...
		for ($j=0; $j < count($m1) ; $j++) { 
			# code...
			if(isset($m1[$i][$j])){
				 $matriz1_corr[$i][$j] = $m1[$i][$j];
			}
			
		}
	}

	$matriz1Final = array();
	foreach ($matriz1_corr as $inner_array) {
	    foreach ($inner_array as $value) {
	        $matriz1Final[] = $value;
	    }
	}

	$matriz2Final = array();
	foreach ($m2 as $inner_array) {
	    foreach ($inner_array as $value) {
	        $matriz2Final[] = $value;
	    }
	}

	
?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Matriz</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	    <style>
	      .card-login {
	        padding: 30px 0 0 0;
	        width: 350px;
	        margin: 0 auto;
	      }
	    </style>
	</head>
	<body >
		<div class="container col-8">  
			<div class="row justify-content-center">  
		        <div class="card text-center">
		        	<div class="card-header">
				    	Resultado
				  	</div>
		            <div class="card-body ">
		            	<div class="card-text">
		                    <?php  
		            		echo $a->trataOperacao($matriz1Final,$matriz2Final);

							fclose($arquivo);
		            	?>
		                </div>			
			            <form method='GET' action="index.php"  >
	                        <div class="col-12">
	                          <button class="mt-2 btn btn-lg btn-info btn-block" type="submit">Realizar outra operação</button>
	                        </div>
			                <br/>
			            </form>
		            </div>
		        </div>
		    </div>
    	</div>
	</body>
</html>