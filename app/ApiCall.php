<?php
namespace App;

use GuzzleHttp\Client;

class ApiCall
{
	const REGIONS = ['LAS' => "https://la2.api.riotgames.com",
					 'LAN' => 'https://la1.api.riotgames.com',
					 'NA' => 'https://na1.api.riotgames.com'	
					];
	const CHAMPIONS_LIST = '/lol/platform/v3/champions';
	const CHAMPION_INFO = '/lol/static-data/v3/champions/';	
	
	public function getChampions()
	{
		$key = env('RIOT_KEY');
		
		$url = self::REGIONS['LAS'].self::CHAMPIONS_LIST.'?freeToPlay=false&api_key='.$key;
		
		$info = $this->makeRequest($url);

		return $info['champions'];
	}

	public function getChampion($id)
	{
		$key = env('RIOT_KEY'); 

		$url = self::REGIONS['NA'].self::CHAMPION_INFO.$id.'?locale=en_US&api_key='.$key;

		$info = $this->makeRequest($url);

		return $info;
	}

	public function makeRequest($url)
	{
		$client = new Client;

		$response = $client->request('GET', $url);

		$info = json_decode($response->getBody(), true);

		return $info;
	}
}