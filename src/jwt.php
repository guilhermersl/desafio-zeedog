<?php
class JWT {

	private $secret;

	public function __construct() {
		$this->secret = "DesafioZeeDogBackend";
	}

	public function create($data) {

		$header = json_encode(array("typ"=>"JWT", "alg"=>"HS256"));

		$payload = json_encode($data);

		$hbase = $this->base64url_encode($header);
		$pbase = $this->base64url_encode($payload);

		$signature = hash_hmac("sha256", $hbase.".".$pbase, $this->secret, true);
		$bsig = $this->base64url_encode($signature);

		$jwt = $hbase.".".$pbase.".".$bsig;

		return $jwt;
	}

	private function base64url_encode( $data ){
	  return rtrim( strtr( base64_encode( $data ), '+/', '-_'), '=');
	}

}