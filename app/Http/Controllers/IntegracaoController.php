<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;

class IntegracaoController extends Controller
{

    public function bulario($bula)
    {
    	$client = new Client();

    	$crawler = $client->request ('GET', 'https://www.bulario.com/'.$bula);

    	$conteudo = $crawler->filter('.p402_premium');

    	if(count($conteudo) > 0)
    	{
    		$conteudo = $conteudo->children();

	    	$colecao;
	    	$bulario = collect();



	    	foreach ($conteudo as $node) 
	    	{
	    		if($node->nodeName == 'a')
	    		{
	    			$colecao = collect();
	    			$bulario->push($colecao);
	    		}
	    		else if($node->nodeName == 'h3')
	    			$fazernada = 'fazernada';
	    		else if($node->nodeName == 'div')
	    			$fazernada = 'fazernada';
	    		else if($node->nodeName == 'ul')
	    			$colecao->push("<ul><li>".$node->nodeValue."</li></ul>");
	    		else
	    			$colecao->push("<$node->nodeName>".$node->nodeValue."</$node->nodeName>");  
	    	};

	    	
	    	//Remover da coleção Contraindicação e Laboratório
	    	$bulario = $bulario->reject(function ($value, $key)
	    	{
			    if($value->contains('<h2>Contraindicações</h2>') || 
			    	$value->contains('<h4>Laboratório</h4>'))
			    	return $value;
			});

	    	return $bulario;
    	}
    	else
    	{
    		return 'erro';
    	}	

    }

    public function consultaremedios($bula)
    {
    	$client = new Client();

    	$crawler = $client->request ('GET', 'https://consultaremedios.com.br/'.$bula.'/bula');

    	$conteudo = $crawler->filter('#contraindicacao');

    	$consultaremedios = collect();

    	if(count($conteudo) > 0)
    	{
    		$conteudo = $conteudo->nextAll()->eq(0)->children();

	    	$titulo = $crawler->filter('#contraindicacao')->children()->eq(0)->text();

	    	$consultaremedios->push('<h2>'.$titulo.'</h2>');

	    	foreach ($conteudo as $node) 
	    	{	
	    		if($node->nodeName == 'ul'){
	    			foreach ($node->getElementsByTagName('li') as $elemento) {
	    				$consultaremedios->push("<ul><li>".$elemento->nodeValue."</li></ul>");
	    			}
	    		}
		
	    		else
	    			$consultaremedios->push("<$node->nodeName>".$node->nodeValue."</$node->nodeName>");
	    	};
    	}

    	return $consultaremedios;
	
    }

    public function farmadelivery($bula)
    {
    	$client = new Client();

    	$crawler = $client->request ('GET', 'https://www.farmadelivery.com.br/catalogsearch/result/?q='.$bula);

    	$conteudo = $crawler->filter('.products-grid > tr > td');

    	$colecao;
    	$farmadelivery = [];

    	if(count($conteudo) > 0)
    	{
    		$i = -1;

	    	foreach ($conteudo as $node) 
	    	{	
	    		$colecao = collect();
	    		$i++;
	    		$farmadelivery[$i] = $colecao;

	    		$colecao->put('imagem', $node->getElementsByTagName('img')[0]->getAttribute('src'));
	    		$colecao->put('nome', $node->getElementsByTagName('a')[0]->nodeValue);
	    		$colecao->put('link', $node->getElementsByTagName('a')[0]->getAttribute('href'));

	    		$qtdSpan = $node->getElementsByTagName('span')->length;
	    		if($qtdSpan == 7)
	    			$colecao->put('preco', $node->getElementsByTagName('span')[5]->nodeValue);
	    		else if($qtdSpan == 4)
	    			$colecao->put('preco', $node->getElementsByTagName('span')[2]->nodeValue);
	    		else
	    			$colecao->put('preco', 'Indisponível');

	    	};  
    	}

    	return $farmadelivery;	

    }

    public function index(Request $request){
    	
    	
    	$bulario = $this->bulario($request->bula);

    	if($bulario == 'erro')
    		return redirect('/')->withErrors("Não houve resultados para o medicamento $request->bula.");

    	$consultaremedios = $this->consultaremedios($request->bula);

    	$farmadelivery = $this->farmadelivery($request->bula);

    	$bula = mb_convert_case($request->bula, MB_CASE_TITLE);

    	return view('resultado', compact('bulario', 'consultaremedios','farmadelivery', 'bula'));

    }
}
