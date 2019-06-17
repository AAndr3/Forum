<header>
	<div class="menu">
		<div class="logo">
			<a href="index.php"><h1>MEGA FORUM</h1></a>
		</div>
		<div class="extras">
			<a  href="#"><i class="fas fa-users"></i> MEMBROS</a>
			<a href="#"><i class="fas fa-question-circle"></i> FAQ</a> 
		</div>
		<div class="loginregistar">
			<?php 
			if(!isset($_SESSION['id_utilizador'])) { ?>
				<h3><a href="registar.php">Criar Conta</a> <span>/</span> <a href="login.php">Iniciar sessão</a></h3>
			<?php }else { ?>
				<a class="logado" href="create_topic.php"><i class="fas fa-plus"></i></a>
				<a class="logado" href="definicoes.php"><i class="fas fa-cog"></i></a>
				<a class="logado" style="text-transform: uppercase;"><?php echo utf8_encode($_SESSION['nome']);?></a>
				<a class="logado" href="index.php?logout=1"><i class="fas fa-sign-out-alt"></i></a>

			<?php } ?>
		</div>
	</div>
</header>


