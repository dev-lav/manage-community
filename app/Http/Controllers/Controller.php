<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiUnprocessableEntityResponse($errors = [])
    {
        return $this->apiResponseBuilder(422, [
            'errors' => [
                'code' => '002',
                'messages' => $errors
            ]
        ]);
    }

    public function apiResponseBuilder($statusCode = 500, $data = [])
	{
	    return response()->json([
	        'status_code' => $statusCode,
	        'data' => $data,
	    ], $statusCode);
	}
}
