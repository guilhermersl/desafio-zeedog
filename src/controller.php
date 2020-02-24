<?php
require 'interfaceapi.php';

//GERAÇÃO DA AUTENTICÃO JWT
require 'jwt.php';	
$jwt = new JWT();
$token = $jwt->create(array("id_user"=>"guilhermersl", "nome"=>"DesafioZeeDog"));
define("MY_JWT", $token);
define("USER_AGENT", "guilhermersl");

class Controller {
	private $api;

	public function __construct(API $api){
		$this->api = $api;
	}

	public function run($param = array()){
		return $this->api->getRepositories($param);
	}	
	
}	