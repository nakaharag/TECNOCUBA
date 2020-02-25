<?php
	// verifica request
	if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['permissao']))
	{

		// inclui configuração do banco
		include("config.php");
		
		// recebe valores 
		$nome = mysqli_real_escape_string($connect, $_POST['nome']);
		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$permissao = $_POST['permissao'];
		$meta_vendas = $_POST['meta_vendas'];
		$meta_contato = $_POST['meta_contato'];
		$meta_orcamento = $_POST['meta_orcamento'];
		$senha = md5(sha1('123456'));

		$query = "INSERT INTO usuarios (usuario_nome, email, permissao, senha, meta_vendas, meta_contato, meta_orcamento) VALUES('$nome', '$email', '$permissao', '$senha', '$meta_vendas', '$meta_contato', '$meta_orcamento')";
		if (!$result = mysqli_query($connect, $query)) {
	        exit(mysqli_error());
	    }
	    echo "Usuário adicionado!";
	}
?>