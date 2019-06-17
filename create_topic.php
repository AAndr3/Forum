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
	<link rel="stylesheet" type="text/css" href="assets/css/create_topic.css">
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
						
</head>
<body>

<?php include('includes/header.php'); ?>

<br><br><br>
<div class="div_topico">
	<div class="div_text">
		<h1>Criar novo tópico</h1><br>
		<h2 style="margin-bottom: 0.6rem;">Título do tópico</h2>
		<input type="text" name="titulo" id="titulo" placeholder="Introduza o titulo do tópico"><br><br>

		<h2 style="margin-bottom: 0.6rem;">Categoria do tópico</h2>
		<select id="categoria" class="selectcat">
			<?php echo mostrar_categoria(); ?>
		</select><br><br>

		<h2 style="margin-bottom: 0.6rem;">Descrição do tópico</h2>
		<textarea id="descricao" style="width: 85.4%;height: 4rem"></textarea><br>

		<button class="button_inserir" id="inserir" onclick="return(inserirtopico())">Inserir tópico</button>
	</div>
</div>

<p id="teste"></p>

<script>
	function inserirtopico() {
		var titulo = document.getElementById("titulo").value;
		var categoria = document.getElementById("categoria").value;
		var nicInstance = nicEditors.findEditor('descricao');
		var descricao = nicInstance.getContent();

		$.ajax({
			type:"post",
			url:"includes/inserir_topico.php",
			data:{titulo, categoria, descricao},
			success:function(data) {
				$('#teste').html(data);
			}
		});

		return false;
	}
</script>


<?php include('includes/footer.php'); ?>

</body>
</html>