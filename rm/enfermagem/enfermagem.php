
<?php

			// Limpa o buffer
			$buffer_limpo = ob_clean();

			

?>

<!DOCTYPE html>
<html>
<head>
 	<meta http-equiv="refresh" content="8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Enfermagem</title>
	<link rel="stylesheet" href="../css/enfermagem.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body class = 'color'>

<header>
	<div id="header">
		<img src="../img/logo.png" alt="Axial">
	</div>
</header>

<div id="principal">

		<?php

			// Inicia o buffer
			$inicia_buffer = ob_start();

				$servidor = "localhost";
				$usuario = "root";
				$senha = "";
				$db = "comando";

				date_default_timezone_set('America/Sao_Paulo');
				$data_atual = date('H:i:s');
					

				$conexao = mysqli_connect($servidor, $usuario, $senha, $db);	
				
				$select = "SELECT status_atual from tbl_status WHERE id = 1";
		        $result = mysqli_query($conexao, $select);
		        $fetch = mysqli_fetch_row($result);
		        $final = $fetch[0];
				$SQL = "SELECT status_atual, tempo from tbl_status WHERE id = 1";
				$RS = mysqli_query($conexao, $SQL);
				echo "<div class='sala1'><h1>Sala Vério 3 Tesla</h1>";
					while($RF = mysqli_fetch_array($RS)){
						$tempo = date("d/m/Y - H:i:s", strtotime($RF[1]));
						$data_banco = date("Y/m/d H:i:s", strtotime($RF[1]));
						$data1 = new DateTime( $data_atual );
						$data2 = new DateTime( $data_banco );
						$tempo2 = $data1->diff($data2);
						$imprima = "{$tempo2->d} Dias {$tempo2->h} Horas {$tempo2->i} Minutos {$tempo2->s} Segundos.";
						if($RF['status_atual'] === '1'){
							echo"<div class='azul'>
									<h1>Exame Iniciado</h1>
									<p>$tempo</p>";
							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao1.txt');

							echo "$imprima";
							echo "</div>";
						}else if ($RF['status_atual'] === '2'){
							// Inicia o buffer
							$inicia_buffer = ob_start();

							echo"<div class='amarelo'>
									<h1>Checar Paciente</h1>
									<p>Desde $tempo</p>";

							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao1.txt');

							echo "$imprima";
							echo "</div>";
						}else if ($RF['status_atual'] === '3'){
							// Inicia o buffer
							$inicia_buffer = ob_start();
							echo"<div class='vermelho'>
									<h1>Contraste</h1>
									<p>Solicitado $tempo</p>";

							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao1.txt');

							echo "$imprima";
							echo"</div>";
						}else if ($RF['status_atual'] === '4'){
							// Inicia o buffer
							$inicia_buffer = ob_start();
							echo"<div class='verde'>
									<h1>Exame Finalizado</h1>
									<p>$tempo</p>";

							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao1.txt');

							echo "$imprima";
							echo"</div>";
						}
					}
				echo "</div>";
			

			//Condicao que compara o buffer com o arquivo txt salvo
			if ($buffer_salvo !== $conteudo)
			{
			    $select = "SELECT status_atual from tbl_status WHERE id = 1";
		        $result = mysqli_query($conexao, $select);
		        $fetch = mysqli_fetch_row($result);
		        $final = $fetch[0];
				$SQL = "SELECT status_atual from tbl_status WHERE id = 1";
				$RS = mysqli_query($conexao, $SQL);
				
					while($RF = mysqli_fetch_array($RS)){
						if($RF['status_atual'] === '1'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salaverioexame.mp3' type='audio/mp3'>
						          </audio>";
						}else if ($RF['status_atual'] === '2'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salaveriochecarpaciente.mp3' type='audio/mp3'>
						          </audio>";
						}else if ($RF['status_atual'] === '3'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salaveriocontraste.mp3' type='audio/mp3'>
						          </audio>";
						}else if ($RF['status_atual'] === '4'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salaverioexamefinalizado.mp3' type='audio/mp3'>
						          </audio>";
						}
					}

		
			   
			    file_put_contents('./txt/previsao1.txt', $buffer_salvo);
			}else{
			    file_put_contents('./txt/previsao1.txt', $buffer_salvo);
			}
			?>

		<?php	

			// Inicia o buffer
			$inicia_buffer = ob_start();

				$select = "SELECT status_atual from tbl_status WHERE id = 2";
		        $result = mysqli_query($conexao, $select);
		        $fetch = mysqli_fetch_row($result);
		        $final = $fetch[0];
				$SQL = "SELECT status_atual, tempo from tbl_status WHERE id = 2";
				$RS = mysqli_query($conexao, $SQL);
				echo "<div class='sala2'><h1>Sala GE</h1>";
					while($RF = mysqli_fetch_array($RS)){
						$tempo = date("d/m/Y - H:i:s", strtotime($RF[1]));
						$data_banco = date("Y/m/d H:i:s", strtotime($RF[1]));
						$data1 = new DateTime( $data_atual );
						$data2 = new DateTime( $data_banco );
						$tempo2 = $data1->diff($data2);
						$imprima = "{$tempo2->d} Dias {$tempo2->h} Horas {$tempo2->i} Minutos {$tempo2->s} Segundos.";
						if($RF['status_atual'] === '1'){
							echo"<div class='azul'>
									<h1>Exame Iniciado</h1>
									<p>$tempo</p>";
							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao2.txt');

							echo "$imprima";
							echo "</div>";
						}else if ($RF['status_atual'] === '2'){
							// Inicia o buffer
							$inicia_buffer = ob_start();

							echo"<div class='amarelo'>
									<h1>Checar Paciente</h1>
									<p>Desde $tempo</p>";

							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao2.txt');

							echo "$imprima";
							echo "</div>";
						}else if ($RF['status_atual'] === '3'){
							// Inicia o buffer
							$inicia_buffer = ob_start();
							echo"<div class='vermelho'>
									<h1>Contraste</h1>
									<p>Solicitado $tempo</p>";

							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao2.txt');

							echo "$imprima";
							echo"</div>";
						}else if ($RF['status_atual'] === '4'){
							// Inicia o buffer
							$inicia_buffer = ob_start();
							echo"<div class='verde'>
									<h1>Exame Finalizado</h1>
									<p>$tempo</p>";

							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao2.txt');

							echo "$imprima";
							echo"</div>";
						}
					}
				echo "</div>";
			
			//Condicao que compara o buffer com o arquivo txt salvo
			if ($buffer_salvo !== $conteudo)
			{
			    $select = "SELECT status_atual from tbl_status WHERE id = 2";
		        $result = mysqli_query($conexao, $select);
		        $fetch = mysqli_fetch_row($result);
		        $final = $fetch[0];
				$SQL = "SELECT status_atual from tbl_status WHERE id = 2";
				$RS = mysqli_query($conexao, $SQL);
				
					while($RF = mysqli_fetch_array($RS)){
						if($RF['status_atual'] === '1'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salageexame.mp3' type='audio/mp3'>
						          </audio>";
						}else if ($RF['status_atual'] === '2'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salagechecarpaciente.mp3' type='audio/mp3'>
						          </audio>";
						}else if ($RF['status_atual'] === '3'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salagecontraste.mp3' type='audio/mp3'>
						          </audio>";
						}else if ($RF['status_atual'] === '4'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salageexamefinalizado.mp3' type='audio/mp3'>
						          </audio>";
						}
					}


		
			   
			    file_put_contents('./txt/previsao2.txt', $buffer_salvo);
			}else{
			    file_put_contents('./txt/previsao2.txt', $buffer_salvo);
			}

			?>
	

	
		<?php


			// Inicia o buffer
			$inicia_buffer = ob_start();

				$select = "SELECT status_atual from tbl_status WHERE id = 3";
		        $result = mysqli_query($conexao, $select);
		        $fetch = mysqli_fetch_row($result);
		        $final = $fetch[0];
				$SQL = "SELECT status_atual, tempo from tbl_status WHERE id = 3";
				$RS = mysqli_query($conexao, $SQL);
				echo "<div class='sala3'><h1>Sala Essenza</h1>";
					while($RF = mysqli_fetch_array($RS)){
						$tempo = date("d/m/Y - H:i:s", strtotime($RF[1]));
						$data_banco = date("Y/m/d H:i:s", strtotime($RF[1]));
						$data1 = new DateTime( $data_atual );
						$data2 = new DateTime( $data_banco );
						$tempo2 = $data1->diff($data2);
						$imprima = "{$tempo2->d} Dias {$tempo2->h} Horas {$tempo2->i} Minutos {$tempo2->s} Segundos.";
						if($RF['status_atual'] === '1'){
							echo"<div class='azul'>
									<h1>Exame Iniciado</h1>
									<p>$tempo</p>";
							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao3.txt');

							echo "$imprima";
							echo "</div>";
						}else if ($RF['status_atual'] === '2'){
							// Inicia o buffer
							$inicia_buffer = ob_start();

							echo"<div class='amarelo'>
									<h1>Checar Paciente</h1>
									<p>Desde $tempo</p>";

							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao3.txt');

							echo "$imprima";
							echo "</div>";
						}else if ($RF['status_atual'] === '3'){
							// Inicia o buffer
							$inicia_buffer = ob_start();
							echo"<div class='vermelho'>
									<h1>Contraste</h1>
									<p>Solicitado $tempo</p>";

							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao3.txt');

							echo "$imprima";
							echo"</div>";
						}else if ($RF['status_atual'] === '4'){
							// Inicia o buffer
							$inicia_buffer = ob_start();
							echo"<div class='verde'>
									<h1>Exame Finalizado</h1>
									<p>$tempo</p>";

							//Atribui o buffer a uma string
							$buffer_salvo = ob_get_flush();

							//Abre o arquivo para ser feita a comparação com o buffer
							$conteudo = file_get_contents('./txt/previsao3.txt');

							echo "$imprima";
							echo"</div>";
						}
					}
				echo "</div>";

			

			//Condicao que compara o buffer com o arquivo txt salvo
			if ($buffer_salvo !== $conteudo)
			{
			   $select = "SELECT status_atual from tbl_status WHERE id = 3";
		        $result = mysqli_query($conexao, $select);
		        $fetch = mysqli_fetch_row($result);
		        $final = $fetch[0];
				$SQL = "SELECT status_atual from tbl_status WHERE id = 3";
				$RS = mysqli_query($conexao, $SQL);
				
					while($RF = mysqli_fetch_array($RS)){
						if($RF['status_atual'] === '1'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salaessenzaexame.mp3' type='audio/mp3'>
						          </audio>";
						}else if ($RF['status_atual'] === '2'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salaessenzachecarpaciente.mp3' type='audio/mp3'>
						          </audio>";
						}else if ($RF['status_atual'] === '3'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salaessenzacontraste.mp3' type='audio/mp3'>
						          </audio>";
						}else if ($RF['status_atual'] === '4'){
							echo"<audio autoplay='autoplay'>
						            <source src='./som/salaessenzaexamefinalizado.mp3' type='audio/mp3'>
						          </audio>";
						}
					}


		
			   
			    file_put_contents('./txt/previsao3.txt', $buffer_salvo);
			}else{
			    file_put_contents('./txt/previsao3.txt', $buffer_salvo);
			}
			mysqli_close($conexao);
			?>

		</div>
	<footer>
		<p>Criado pela T.I da Axial</p>
	</footer>
</body>
</html>


