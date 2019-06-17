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
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">

</head>
<body>

<?php include('includes/header.php'); ?>

<br>
<br>
<div class="div_login">
		<div class="login_title">
			<h1>Iniciar sessão</h1>
		</div>
		<br><br>
		<form method="post">

			<?php 
			if(isset($_SESSION['erros'])) {
				?><h3 style="color:red;"><?php echo $_SESSION['erros'];
					unset($_SESSION['erros']); ?></h3><?php
			} ?>
			<label>Email:</label><br>
			<input type="text" name="email" id="email" class="input">
			<br><br>
			<label>Palavra passe:</label><br>
			<input type="password" name="pass" id="pass" class="input">
			<br><br>
			<input type="submit" value="Iniciar sessão" class="inputbotao" id="entrar" name="entrar" onclick="return(verificar_login())">
			<br><br>
			<h3>Ainda não tens conta? <a href="registar.php">Regista-te</a></h3>
		</form>
	</div>

<?php include('includes/footer.php'); ?>



<script>
	function verificar_login() {
		var email = document.getElementById("email");
		var pass = document.getElementById("pass");

		if(email.value == "") {
			email.style.border = "2px solid red";
			return false;
		}else {
			email.style.border = "1px solid grey";
		}

		if(pass.value == ""){
			pass.style.border = "2px solid red";
			return false;
		}else {
			pass.style.border = "1px solid grey";
		}
	}
</script>
