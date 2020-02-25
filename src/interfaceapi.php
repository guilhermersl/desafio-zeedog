<?php

//INTERFACE API
interface API {
    public function doRequest($uri, $method, $token, $user_agent);

}