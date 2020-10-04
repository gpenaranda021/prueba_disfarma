<?php
// Especificar clase y funciones que gestionan comunicación con la API
class Utils
{
    static public function curl_request($url, $params=array(), $method = "GET"){

		$headers = array(
			"Content-Type: application/json",
		    "Accept-Language: es"
		);

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_SSL_VERIFYPEER => false,
		    CURLOPT_URL => $url
		));
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 

		if ($method === "POST"){
			curl_setopt($curl, CURLOPT_POST, 1); 	
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params, JSON_UNESCAPED_UNICODE)); 	
        } 
        
		$response = json_decode(curl_exec($curl), 1);
		$objectResponse = curl_getinfo($curl);
		curl_close($curl);

		#var_dump($url);
		#var_dump($params);
		#var_dump($response);
		#var_dump($objectResponse);

		return array(
			"http_code" => $objectResponse["http_code"],
			"total_time" => $objectResponse["total_time"],
			"response" => $response["records"]
		);
	}

	static public function json_response($response){
		echo json_encode($response);
		exit;
	}
}

?>