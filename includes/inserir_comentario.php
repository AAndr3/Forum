<?php 

include('config.php');

if(!isset($_SESSION['id_utilizador'])) {
	$_SESSION['erros'] = "Deves iniciar sessão";
	?><script>window.location = "login.php"; </script><?php
}else {
	$id_utilizador = $_SESSION['id_utilizador'];
	$id_topico = $_POST['id_topico'];
	$resposta = $_POST['input'];

	$sql = "INSERT INTO respostas (resposta, id_utilizador, id_topico, hora) VALUES ('$resposta', '$id_utilizador', '$id_topico', CURDATE())";
	$query = mysqli_query($bd, $sql);

	$sql_select = "SELECT * FROM respostas WHERE id_topico = '$id_topico'";
	$query_select = mysqli_query($bd, $sql_select);
	$res = mysqli_fetch_assoc($query_select);

		$sql_utilzador_resposta = "SELECT * FROM utilizadores WHERE id_utilizador = '$id_utilizador'";
      $query_utilizador_resposta = mysqli_query($bd, $sql_utilzador_resposta);
      $res_utilizador_resposta = mysqli_fetch_assoc($query_utilizador_resposta);

      $nome_utilizador_resposta = $res_utilizador_resposta['nome_utilizador'];

      ?>

      <div class="div_resposta2">
  			<h5>By: <?php echo $nome_utilizador_resposta;?></h5>
  			<br>
  			<?php echo $resposta;?>
		</div><?php

}

?>

<style>

  .div_resposta2 {
    
    width: 95rem;
    margin: auto;
    margin-top:-1.1rem;
    border: 1px solid black;
  }

</style>