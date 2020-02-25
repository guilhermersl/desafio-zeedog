<?php
require 'jwt.php';

//IMPLEMENTAÇÃO DA INTERFACE PARA CONSUMIR API GITHUB
class APIGitHub implements API {    

    //BUSCA OS REPOSITÓRIO DO GITHUB
    public function doRequest($uri, $method, $token, $user_agent) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Accept: application/vnd.github.v3+json',
            'Authorization: Bearer'. $token
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);        
        $ret = json_decode(curl_exec($curl));

        //VERIFICA SE HOUVE ALGUM ERRO AO FAZER A REQUISIÇÃO
        if (curl_errno($curl)) {
            echo 'Erro ao buscar os repositórios: ' . curl_error($curl);
        }        
        //VERIFICA SE HOUVE ALGUM ERRO AO FAZER A REQUISIÇÃO        


        curl_close($curl); 
        
        return $ret;
    }    

    //ENDPOINT DE REPOSITÓRIOS: "https://api.github.com/search/repositories"
    public function getRepositories($param = array()){  
        $dados = array();

		$param['buscaLivre'] = (isset($param['buscaLivre']) && !empty($param['buscaLivre']))	? $param['buscaLivre']   : '';
		$param['linguagem']  = (isset($param['linguagem']) 	&& !empty($param['linguagem'])) 	? $param['linguagem']    : 'ruby';
		$param['usuario'] 	 = (isset($param['usuario']) 	&& !empty($param['usuario'])) 		? $param['usuario']      : '';
		$param['pagina'] 	 = (isset($param['pagina']) 	&& !empty($param['pagina']))		? $param['pagina']       : '1';
		$param['sort'] 		 = (isset($param['sort']) 		&& !empty($param['sort']))			? $param['sort']         : 'stars';		
		$param['order'] 	 = (isset($param['order'])	 	&& !empty($param['order'])) 		? $param['order']        : 'desc';

		$uri 	= "https://api.github.com/search/repositories?q=".$param['buscaLivre']."+in:name,full_name,description".
				  "+language:".$param['linguagem']."+user:".$param['usuario'].
				  "&page=".$param['pagina']."&per_page=100".
				  "&sort=".$param['sort'].
                  "&order=".$param['order'];

        //GERAÇÃO DA AUTENTICÃO JWT
        $jwt        = new JWT();
        $token_jwt  = $jwt->create(array("id_user"=>"guilhermersl", "nome"=>"DesafioZeeDog"));
        $user_agent = "guilhermersl"; 

        //FAZ A REQUISIÇÃO DE FATO!
        $lista 	= $this->doRequest($uri,"GET", $token_jwt, $user_agent);

        //MONTA RETORNO
		if ( $lista->total_count > 0 ) {
            $itens  = $lista->items;	
            
			foreach($itens as $item) {
				$dados['id'][] 					= $item->id;
				$dados['full_name'][] 			= $item->full_name;
				$dados['description'][] 		= $item->description;
				$dados['stargazers_count'][] 	= $item->stargazers_count;			
				$dados['forks_count'][] 		= $item->forks_count;			
                $dados['owner_login'][] 		= $item->owner->login;
                $dados['updated_at'][]  		= date("d/m/Y H:i:s", strtotime($item->updated_at));                
			}
        }                    	
        return $dados;            
    }   

    
}