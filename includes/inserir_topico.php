<?php 

include('config.php');

if(!isset($_SESSION['id_utilizador'])) {
	$_SESSION['erros'] = "Deves iniciar sessão";
	?><script>window.location = "login.php"; </script><?php
	} else {
		$id_utilizador = $_SESSION['id_utilizador'];
		$titulo = $_POST['titulo'];
		$id_categoria = $_POST['categoria'];
		$descricao = $_POST['descricao'];

		$sql_titulo = "INSERT INTO titulo (titulo) VALUES ('$titulo')";
		$query = mysqli_query($bd, $sql_titulo);
		$id_titulo = mysqli_insert_id($bd);


		$sql_descricao = "INSERT INTO assunto (assunto) VALUES ('$descricao')";
		$query_descricao = mysqli_query($bd, $sql_descricao);
		$id_descricao = mysqli_insert_id($bd);

		$sql = "INSERT INTO topicos (id_categoria, id_titulo, id_assunto, id_utilizador, mostrar) VALUES ('$id_categoria', '$id_titulo', '$id_descricao', '$id_utilizador', '0')";
		$query = mysqli_query($bd, $sql);

		?><script>window.location = "index.php"; </script><?php

	}

	 ?>