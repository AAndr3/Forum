<?php include('includes/config.php');
	include('includes/servidor.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mega Forum</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>
<body>

<?php include('includes/header.php'); ?>
<br>

<h1 style="margin-left:15rem;">Ultimos tópicos inseridos</h1>
<br>
<?php 

$sql = "SELECT * FROM topicos ORDER BY id_topico ASC";
$query = mysqli_query($bd, $sql);
$res = mysqli_fetch_assoc($query);

do {
	$id_topico = $res['id_topico'];
	$id_categoria = $res['id_categoria'];
	$id_titulo = $res['id_titulo'];
	$id_assunto = $res['id_assunto'];
	$id_utilizador = $res['id_utilizador'];

	$sql_categoria = "SELECT * FROM categoria WHERE id_categoria = '$id_categoria'";
	$query_categoria = mysqli_query($bd, $sql_categoria);
	$res_categoria = mysqli_fetch_assoc($query_categoria);
	$categoria = $res_categoria['categoria'];

	$sql_titulo = "SELECT * FROM titulo WHERE id_titulo = '$id_titulo'";
	$query_titulo = mysqli_query($bd, $sql_titulo);
	$res_titulo = mysqli_fetch_assoc($query_titulo);
	$titulo = $res_titulo['titulo'];

	$sql_assunto = "SELECT * FROM assunto WHERE id_assunto = '$id_assunto'";
	$query_assunto = mysqli_query($bd, $sql_assunto);
	$res_assunto = mysqli_fetch_assoc($query_assunto);
	$assunto = $res_assunto['assunto'];

	$sql_utilizador = "SELECT * FROM utilizadores WHERE id_utilizador = '$id_utilizador'";
	$query_utilizador = mysqli_query($bd, $sql_utilizador);
	$res_utilizador = mysqli_fetch_assoc($query_utilizador);
	$nome = $res_utilizador['nome_utilizador'];


	?>
	<div class="div_topicos" onclick="window.location='more.php?id_topico=<?php echo $id_topico;?>'">
		<div class="icone_topico">	
			<i class="fa fa-comment"></i>
		</div>
		<div class="autor_topico">
			<h2 style="display: inline-block;vertical-align: middle;"><?php echo $titulo;?></h2>
			<h4>By: <?php echo utf8_encode($nome);?></h4>
		</div>
		<div class="extras_topico">
			<h4>3</h4>
			<h4>4</h4>
			<br>
			<i class="fas fa-comment-dots"></i>

			<i class="fas fa-thumbs-up"></i>
		</div>
	</div> <br>
<?php

}while($res = mysqli_fetch_assoc($query));

?>


<?php include('includes/footer.php'); ?>

</body>
</html>