<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class IntegracaoController extends Controller
{
    public function index(Request $request){

    	$vai = file_get_contents('https://www.tuasaude.com/dorflex/');

    	dd($vai);

    	//return view('resultado');
    }
}
