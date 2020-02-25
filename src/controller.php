<?php
require 'interfaceapi.php';

class Controller {
	private $api;

	public function __construct(API $api){
		$this->api = $api;
	}

	public function run($param = array()){
		return $this->api->getRepositories($param);
	}	
	
}	