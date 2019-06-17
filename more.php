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
	<link rel="stylesheet" type="text/css" href="assets/css/more.css">

	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body>

<?php include('includes/header.php'); 

	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $id_topico = substr($url, strrpos($url, '=') + 1);
  $_SESSION['id_topico'] = $id_topico;
  $sql_topico = "SELECT * FROM topicos WHERE id_topico = '$id_topico'";
  $query_topico = mysqli_query($bd, $sql_topico);
  $res_topico = mysqli_fetch_assoc($query_topico);

  $id_titulo = $res_topico['id_titulo'];

  $id_categoria = $res_topico['id_categoria'];

  $id_assunto = $res_topico['id_assunto'];

  $id_utilizador = $res_topico['id_utilizador'];


  $sql_titulo = "SELECT * FROM titulo WHERE id_titulo = '$id_titulo'";
  $query_titulo = mysqli_query($bd, $sql_titulo);
  $res_titulo = mysqli_fetch_assoc($query_titulo);
  $titulo = $res_titulo['titulo'];

  $sql_categoria = "SELECT * FROM categoria WHERE id_categoria = '$id_categoria'";
  $query_categoria = mysqli_query($bd, $sql_categoria);
  $res_categoria = mysqli_fetch_assoc($query_categoria);
  $categoria = $res_categoria['categoria'];

  $sql_assunto = "SELECT * FROM assunto WHERE id_assunto = '$id_assunto'";
  $query_assunto = mysqli_query($bd, $sql_assunto);
  $res_assunto = mysqli_fetch_assoc($query_assunto);
  $assunto = $res_assunto['assunto'];

  $sql_utilzador = "SELECT * FROM utilizadores WHERE id_utilizador = '$id_utilizador'";
  $query_utilizador = mysqli_query($bd, $sql_utilzador);
  $res_utilizador = mysqli_fetch_assoc($query_utilizador);
  $nome_utilizador = $res_utilizador['nome_utilizador'];
  $joined = $res_utilizador['data_registo'];


  $sql_resposta = "SELECT * FROM respostas WHERE id_topico = '$id_topico'";
  $query_resposta = mysqli_query($bd, $sql_resposta);
  $res_resposta = mysqli_fetch_assoc($query_resposta);
  $cont_resposta = mysqli_num_rows($query_resposta);

?>

<br>
<div class="div_topico">
  <div class="topico_left">
	   <h1><?php echo $titulo;?></h1>
	   <h5>By <span><?php echo utf8_encode($nome_utilizador);?></span><i style="margin-left:0.3rem;vertical-align: text-bottom;" class="fa fa-angle-double-right"></i><a style="margin-left:0.3rem;font-size:1rem;vertical-align: middle;"><?php echo utf8_encode($categoria);?></a></h5>
  </div>
  <div class="informacoes_extra">
    <h4><span>Joined:</span><?php  echo date('d-m-Y', strtotime($joined));?></h4>


    <?php 

    if(isset($_SESSION['id_utilizador'])) { ?>
      <button id="likebutton" class="buttons"><i class="fas fa-thumbs-up"></i></button>
  <?php } ?>
    

    <button class="buttons"><i class="fas fa-edit"></i></button>
  </div>

	<hr style="margin-top:0.5rem;opacity: 0.5">

	<div class="assunto_div">
		<?php echo $assunto;?>  
	</div>
</div>

<br>

<?php 

if($cont_resposta > 0) {

	do {

  	  $resposta = $res_resposta['resposta'];

      $id_utilizador_resposta = $res_resposta['id_utilizador']; 

      $sql_utilzador_resposta = "SELECT * FROM utilizadores WHERE id_utilizador = '$id_utilizador_resposta'";
      $query_utilizador_resposta = mysqli_query($bd, $sql_utilzador_resposta);
      $res_utilizador_resposta = mysqli_fetch_assoc($query_utilizador_resposta);

      $nome_utilizador_resposta = $res_utilizador_resposta['nome_utilizador'];

      ?>
		<div class="div_resposta">
  			<h5>By: <?php echo $nome_utilizador_resposta;?></h5>
  			<br>
  			<?php echo $resposta;?>
		</div><?php

	}while($res_resposta = mysqli_fetch_assoc($query_resposta));
    
  ?>

<?php } ?>


<br>
<div id="responder_topico" class="responder_div">
	<button class="responder"  id="responder">Responder</button>
	<input id="inputresponder" style="display: none;height: 1.5rem;outline: none;" placeholder="Adicionar comentário" type="text" size="100">
	<button class="enviar" id="enviar" style="display: none;background: red;">Enviar</button>
</div>


<br><br>

<p id="teste"></p>

<script>

document.getElementById("likebutton").addEventListener("click", like);

document.getElementById("responder").addEventListener("click", responder);

document.getElementById("enviar").addEventListener("click", responder_enviar);


function like() {
  var likebutton = document.getElementById("likebutton");
  var verifica = 0;
  var id_topico = "<?php echo $id_topico;?>";

  if(likebutton.style.color == "black") {
    likebutton.style.color = "green";
    verifica = 1;
  }else {
    likebutton.style.color = "black";
    verifica = 2;
  }


  $.ajax({
    type:"post",
    url:"includes/botao_like.php",
    data:{verifica, id_topico},
    success:function(data) {
      $('#teste').html(data);
    }
  });

}

function responder() {
	var botao = document.getElementById("responder");
	var input = document.getElementById("inputresponder");
	var enviar = document.getElementById("enviar")

	botao.style.display = "none";
	input.style.display = "inline-block";
	enviar.style.display = "inline-block";
}

function responder_enviar() {
  var input = document.getElementById("inputresponder").value;

  var id_topico = "<?php echo $id_topico;?>";

  $.ajax({
    type:"post",
    url:"includes/inserir_comentario.php",
    data:{input, id_topico},
    success:function(data) {
      $('#responder_topico').html(data);
    }
  })
}
</script>




<?php include('includes/footer.php'); ?>