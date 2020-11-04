<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseApiController extends Controller
{
	/**
	 * CustomResponse
	 *
	 * @param $data
	 * @param  string $message
	 * @return
	 */
	public function customResponse($data, $status, $message="")
	{
        return response()->json([
        	'data' => $data,
        	'status' => $status,
        	'message' => $message."_".uniqid(),
		], Response::HTTP_OK);
	}
}