<?php

require 'vendor/autoload.php';

class RajaOngkir {

	private $key;
	private $endpoint;

	public function __construct() {
		$this->key = 'apikey_raja_ongkir';
		$endpoint_starter = 'http://rajaongkir.com/api/starter/';
		$endpoint_basic = 'http://rajaongkir.com/api/basic/';
		$endpoint_pro = 'http://pro.rajaongkir.com/api/';
		$this->endpoint = $endpoint_starter;
	}

	public function getProp($params=array()) {
		return $this->http('get','province',$params);
	}

	public function getKota($params=array()) {
		return $this->http('get','city',$params);
	}

	public function getBiaya($params=array()) {
		return $this->http('post','cost',$params);
	}

	private function http($type,$path,$params){
		$client = new \GuzzleHttp\Client();
		$headers = array('headers'=>array('key'=>$this->key));
		if($type=='post'){
			$url = $this->endpoint.$path;
			$headers['form_params'] = $params;
			$response = $client->post($url,$headers);
		}
		else{
			$url = $this->endpoint.$path.$this->query($params);
			$response = $client->get($url,$headers);
		}
		return json_encode(json_decode($response->getBody()));
	}

	private function query($params){
		return $query = is_array($params)?'?'.http_build_query($params):'';
	}
}