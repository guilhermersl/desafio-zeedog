<?php  
	define("BASE_URL", "http://localhost/projetos/desafiozeedog/"); 
	define("BASE_URL_SRC", "http://localhost/projetos/desafiozeedog/src/");

	require '/src/controller.php';
	require '/src/apigithub.php';
	echo "at� aqui ok"
	/*
	//CHAMA CONTROLLER QUE REALIZAR� A REQUISI��O PARA A CARGA INICIAL
	$api = new APIGitHub();
	$controller = new Controller($api);
	$dados = $controller->run();
	
	extract($dados);
	require '/src/views/home.php';
	*/

?>     