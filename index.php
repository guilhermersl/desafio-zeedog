<?php  
require 'src/controller.php';
require 'src/apigithub.php';

//CHAMA CONTROLLER QUE REALIZAR� A REQUISI��O PARA A CARGA INICIAL
$api = new APIGitHub();
$controller = new Controller($api);
$dados = $controller->run();

extract($dados);
require 'src/views/home.php';

?>     