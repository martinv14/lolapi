<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getApiSuccess($data, $resource = 'undefined')
    {
    	$response = [
            'code' => 200,
            'message' => 'Ok',
            'resource' => $resource,
            'data' => $data
        ];

        return json_encode($response);
    }
}
