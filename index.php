<?php  
require 'src/controller.php';
require 'src/apigithub.php';

//CHAMA CONTROLLER QUE REALIZARÁ A REQUISIÇÃO PARA A CARGA INICIAL
$api = new APIGitHub();
$controller = new Controller($api);
$dados = $controller->run();

extract($dados);
require 'src/views/home.php';

?>     