<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="refresh" content="5">
	<title>Operador</title>
	<link rel="stylesheet" href="../css/operador.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>

<body class="fundo">

	<header class="cabecalho">
		<div><a href="../index.php"><img src='../img/logo.png'  height='100' width='200' class="centro"></a></div>	
	</header>

	<div class="menu">
		<ul>
			<li><a href='../verio/medico.php'>Vério 3Tesla</a></li>
			<li><a href='../ge/medico.php'>GE HDXt</a></li>
			<li><a href='../essenza/medico.php'>Essenza</a></li>
		</ul>
			
	</div>
	
	<div class="tudo">

			<div class="cabecalho2">
				<h1>Sala de Ressonância Essenza</h1>
			</div>

	
		<div class='status'>

			<?php
				$servidor = "localhost";
				$usuario = "root";
				$senha = "";
				$db = "comando";

				$conexao = mysqli_connect($servidor, $usuario, $senha, $db);	
				
				$select = "SELECT status_atual from tbl_status WHERE id = 3";
		        $result = mysqli_query($conexao, $select);
		        $fetch = mysqli_fetch_row($result);
		        $final = $fetch[0];
				$SQL = "SELECT status_atual from tbl_status WHERE id = 3";
				$RS = mysqli_query($conexao, $SQL);
				
					while($RF = mysqli_fetch_array($RS)){
						if($RF['status_atual'] === '1'){
							echo"<div class='iniciado'><h1>Exame Iniciado</h1></div>";
						}else if ($RF['status_atual'] === '2'){
							echo"<div class='checar'><h1>Checar Paciente</h1></div>";
						}else if ($RF['status_atual'] === '3'){
							echo"<div class='contraste'><h1>Contraste</h1></div>";
						}else if ($RF['status_atual'] === '4'){
							echo"<div class='finalizado'><h1>Exame Finalizado</h1></div>";
						}
					}
				mysqli_close($conexao);
			?>
			
			</div>

				<div class="formulario">
					<form action="envio.php" method="POST" accept-charset="utf-8" class="formulario">
						<button class="btn btn-primary" type="submit" name="opcao" value="1">Exame Iniciado</button>
						<button class="btn btn-warning" type="submit" name="opcao" value="2">Checar Paciente</button>
						<button class="btn btn-danger" type="submit" name="opcao" value="3">Contraste</button>
						<button class="btn btn-success" type="submit" name="opcao" value="4">Exame Finalizado</button>
					</form>
				</div>
			
			</div>
	<footer class='foot'>
		<p>Criado pela T.I da Axial</p>
	</footer>

</body>
</html>