<?php

include('funcoes.php');

if(isset($_POST['entrar'])) {
	$email = mysqli_real_escape_string($bd, $_POST['email']);
	$pass = mysqli_real_escape_string($bd, $_POST['pass']);

	$sql = "SELECT * FROM utilizadores WHERE email = '$email' AND password = '$pass'";
	$query = mysqli_query($bd, $sql);
	$res = mysqli_fetch_assoc($query);
	$cont = mysqli_num_rows($query);

	if($cont == 1) {
		$_SESSION['id_utilizador'] = $res['id_utilizador'];
		$_SESSION['nome'] = $res['nome_utilizador'];
		$_SESSION['email'] = $res['email'];
		header('location: index.php');
	} else {
		$_SESSION['erros'] = "Verifique os dados";
	}
}


if(isset($_POST['registar'])) {
	$user = mysqli_real_escape_string($bd, $_POST['user']);
	$email = mysqli_real_escape_string($bd, $_POST['email']);
	$pass = mysqli_real_escape_string($bd, $_POST['pass']);
	$pass2 = mysqli_real_escape_string($bd, $_POST['pass2']);

	$sql_email = "SELECT * FROM utilizadores WHERE email = '$email'";
	$query_email = mysqli_query($bd, $sql_email);
	$cont = mysqli_num_rows($query_email);

	if($cont > 0) {
		$_SESSION['erros'] = "Email já existente";
	}else if($pass != $pass2) {
		$_SESSION['erros'] = "As palavras passes não coincidem";
	}else {
		$foto = "default.png";
		$foto_capa = "default_capa.jpg";
		$sql = "INSERT INTO utilizadores (nome_utilizador,email,password,foto,data_registo,activo,foto_capa) VALUES ('$user', '$email', '$pass', '$foto', CURDATE(), '1', '$foto_capa')";
		$query = mysqli_query($bd, $sql);
		$sql_utilizador = "SELECT * FROM utilizadores WHERE email = '$email' AND password = '$pass'";
		$query_utilizador = mysqli_query($bd, $sql_utilizador);
		$res_utilizador = mysqli_fetch_assoc($query_utilizador);
		$_SESSION['id_utilizador'] = $res_utilizador['id_utilizador'];
		$_SESSION['nome'] = $res_utilizador['nome_utilizador'];
		$_SESSION['email'] = $res_utilizador['email'];
	}
}


if(isset($_GET['logout'])) {
	unset($_SESSION['id_utilizador']);
	unset($_SESSION['nome']);
	unset($_SESSION['email']);
	header('location: index.php');
}