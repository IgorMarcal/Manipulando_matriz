<?php session_start(); ?>

<!DOCTYPE>
	<html>
	<head>
		<title>Matriz</title>
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	    <style>
	      .card-login {
	        padding: 30px 0 0 0;
	        width: 350px;
	        margin: 0 auto;
	      }
	    </style>
	</head>
	</head>
	<body>
		<nav class="navbar navbar-dark bg-dark">
	      <a class="navbar-brand " href="#">
	       	Operação de Matrizes
	      </a>
    	</nav>
		<div class="container">    
      		<div class="row">
		        <div class="card-login">
		          <div class="card">
		            <div class="card-body">
		            	<h1>Intruções:</h1>
		            	<p>Digite <strong>","</strong> para separar as colunas e <strong>"-"</strong> para separar as linhas da matriz:</p>
		              <form method='GET' action="registra_matriz.php"  >
		                <div class="form-group">
		                  <input name="matriz1" type="text" class="form-control" placeholder="Matriz 1">  
		                </div>
		                <div class="form-group">
		                  <input name="matriz2" type="text" class="form-control" placeholder="Matriz 2">
		                </div>

		                 <div class="form-group">
	                        <label>Categoria</label>
	                        <select name="operacao" class="form-control">
	                          <option>Subtração</option>
	                          <option>Adição</option>
	                          <option>Multiplicação</option>
	                        </select>
	                      </div>
	                      <?php 

                        	if(isset($_GET['error'])){
                        		?>
                        		<p class="text-danger"><strong>Favor preencher campos vazios</p></strong>
                        		
                        		<?php
                        	}?>
                        <div class="col-12">
                          <button class="btn btn-lg btn-info btn-block" type="submit">Enviar</button>
                        </div>
		                <br/>
		              </form>
		            </div>
		          </div>
		        </div>
    		</div>
    	</div>
	</body>
</html>