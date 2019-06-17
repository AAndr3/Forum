<?php

include('config.php');

$verifica = $_POST['verifica'];

$id_utilizador = $_SESSION['id_utilizador'];

$id_topico = $_POST['id_topico'];

if($verifica == 1) {
	$sql = "INSERT INTO respostas (id_topico, id_utilizador) VALUES ('$id_topico', '$id_utilizador')";
	$query = mysqli_query($bd, $sql);

}