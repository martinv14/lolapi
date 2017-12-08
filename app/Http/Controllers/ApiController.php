<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\ApiCall;
class ApiController extends Controller
{
    public function call()
    {
    	$api = new ApiCall;
    	return $api->getChampions();
    }
}
