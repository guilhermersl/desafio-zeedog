<?php
//define("BASE_URL", "http://localhost/projetos/desafiozeedog/"); 	

$param = array(
    "buscaLivre"    => $_POST['buscaLivre'],
    "linguagem"     => $_POST['linguagem'],
    "usuario"       => $_POST['usuario'],
    "pagina"        => $_POST['currentPage'],
    "sort"          => $_POST['sort'],
    "order"         => $_POST['order']
);

//CHAMA CONTROLLER QUE REALIZAR? A REQUISI??O PARA A CARGA INICIAL
require 'controller.php';
require 'apigithub.php';
$api = new APIGitHub();
$controller = new Controller($api);
$dados = $controller->run($param);
$_POST = array();

extract($dados);
require_once( 'views/repositorios.php');

?>