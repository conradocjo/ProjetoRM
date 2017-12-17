<!DOCTYPE html>
<html>
<head>
	<?php
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$db = "comando";

		$opcao = $_POST['opcao'];
		$conexao = mysqli_connect($servidor, $usuario, $senha, $db);
		$update = mysqli_query($conexao, "UPDATE tbl_status SET status_atual = '$opcao' WHERE id = 3");		
		mysqli_close($conexao);
	?>
	<script type="text/javascript" charset="utf-8">
		javascript:window.history.go(-1);
	</script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
</head>
<body>
</body>
</html>
