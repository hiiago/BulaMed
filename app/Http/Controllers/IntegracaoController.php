<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class IntegracaoController extends Controller
{
    public function index(Request $request){

    	$client = new Client();

    	$crawler = $client->request ('GET', 'https://www.bulario.com/dorflex/');

    	$crawler = $crawler->filterXPath('//div[contains(@class, "p402_premium")]')->children();

    	//$indicacao = $crawler->filterXPath('//a[contains(@name, "indicacao")]/following-sibling::*');

    	$indicacao = $crawler->filterXPath('//a[contains(@name, "indicacao")]/following-sibling::*[not(following-sibling::a[contains(@name, "posologia")])]');
    	

    	$paragrafos = collect();

    	foreach ($indicacao as $node ) {
    		$paragrafos->push($node->nodeName);
    	}

		dd($paragrafos);

    	$crawler->filter('p')->each(function ($node) {
		   
    		
		
		});

    	

    	//$vai = file_get_contents('https://www.tuasaude.com/dorflex/');

    	
    	dd($crawler->text());

    	//return view('resultado');
    }
}
