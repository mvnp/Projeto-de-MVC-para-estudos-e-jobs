<?php 
namespace Controllers;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class Scrapash extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public static function init($url = null)
	{
		$client = new Client([
		    'base_uri' => 'https://palhocasites.com.br/vista/scrap/get',
		    'timeout'  => 60
		]);

		$goutteClient = new Client();
		$guzzleClient = new GuzzleClient(array(
		    'timeout' => 60,
		));

		$scrapUrl = $url;
		$urlScrap = (( is_null($scrapUrl) ) ? null : $scrapUrl);

		$goutteClient->setClient($guzzleClient);		
		$crawler = $client->request('GET', $urlScrap);

		$result = "";
		
		// Get the latest post in this category and display the titles
		$crawler->filter('article.cliente-dados')->each(function($node, $i) use (&$result, $crawler){
			$result = $node->html();
		});

		if(strlen($result) === 0){
			$crawler->filter('article.endSim')->each(function($node, $i) use (&$result, $crawler){
				$result = $node->html();
			});
		}

		return $result;
	}
}