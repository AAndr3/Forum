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
	<link rel="stylesheet" type="text/css" href="assets/css/registar.css">
</head>
<body>

<?php include('includes/header.php'); ?>

<br>

	<div class="div_registar">
		<div class="Registar_title">
			<h1>Registar</h1>
		</div>
		<br>
		<form method="post">
			<?php 
			if(isset($_SESSION['erros'])) {
				?><h3 style="color:red;"><?php echo $_SESSION['erros'];
					unset($_SESSION['erros']); ?></h3><?php
			} ?>

			<label>Username:</label><br>
			<input type="text" name="user" id="user" class="input">
			<br><br>
			<label>Email:</label><br>
			<input type="text" name="email" id="email" class="input">
			<br><br>
			<label>Palavra passe:</label><br>
			<input type="password" name="pass" id="pass" class="input">
			<br><br>
			<label>Confirmar palavra passe:</label><br>
			<input type="password" name="pass2" id="pass2" class="input">
			<br><br>
			<input type="submit" value="Registar" class="inputbotao" id="registar" name="registar" onclick="return(verificar_registar())">
			<br><br>
			<h3>Já tens conta? <a href="login.php">Inicia sessão</a></h3>
		</form>
	</div>


<?php include('includes/footer.php'); ?>


<script>
	function verificar_registar() {
		var user = document.getElementById("user");
		var email = document.getElementById("email");
		var pass = document.getElementById("pass");
		var pass2 = document.getElementById("pass2");

		if(user.value == "") {
			user.style.border = "2px solid red";
			return false;
		}else {
			user.style.border = "1px solid grey";
		}

		if(email.value == "") {
			email.style.border = "2px solid red";
			return false;
		}else {
			email.style.border = "1px solid grey";
		}

		if(pass.value == "") {
			pass.style.border = "2px solid red";
			return false;
		}else {
			pass.style.border = "1px solid grey";
		}

		if(pass2.value == "") {
			pass2.style.border = "2px solid red";
			return false;
		}else {
			pass2.style.border = "1px solid grey";
		}	
	}
	</script>

</body>
</html>

