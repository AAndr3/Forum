<?php

include('config.php');

$verifica = $_POST['verifica'];

$id_utilizador = $_SESSION['id_utilizador'];

$id_topico = $_POST['id_topico'];

echo $verifica;

if($verifica == 1) {
	$sql = "INSERT INTO likes (id_topico, id_utilizador) VALUES ('$id_topico', '$id_utilizador')";
	$query = mysqli_query($bd, $sql);
}

if($verifica == 2) {
	$sql = "DELETE FROM likes WHERE id_topico = '$id_topico' AND id_utilizador = '$id_utilizador'";
	$query = mysqli_query($bd, $sql);
}