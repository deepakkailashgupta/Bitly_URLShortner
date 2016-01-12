<?php

class Bitly_URLShortner {
	
	static function shortenurl($url){
	
		$bitly = 'http://api.bit.ly/v3/shorten?format=json&longUrl='.urlencode($url).'&login='.BITLY_LOGIN.'&apiKey='.BITLY_APIKEY;

		if($response = @file_get_contents($bitly)) {
	
			if(!empty($response)){

				$json = json_decode($response,true);

				if(isset($json['status_code']) && $json['status_code'] == '200' ){
	
					if(isset($json['data']) && isset($json['data']['url'])) {
		
						return $json['data']['url'];
					
					} 
		
				}	
		
			}
		} 
	
		return false;
	
	}
	

}
