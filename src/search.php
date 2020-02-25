<?php
$param = array(
    "searchFree"    => $_POST['searchFree'],
    "lang"          => $_POST['lang'],
    "user"          => $_POST['user'],
    "page"          => $_POST['currentPage'],
    "sort"          => $_POST['sort'],
    "order"         => $_POST['order']
);

//CHAMA CONTROLLER QUE REALIZARÁ A REQUISIÇÃO PARA A CARGA INICIAL
require 'controller.php';
require 'apigithub.php';
$api = new APIGitHub();
$controller = new Controller($api);
$dados = $controller->run($param);
$_POST = array();

extract($dados);
require_once( 'views/repositorios.php');

?>