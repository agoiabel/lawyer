<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PractiseResource;
use App\Http\Requests\PractiseStoreRequest;
use Symfony\Component\HttpFoundation\Response;

class PractiseController extends BaseApiController
{
	/**
	 * Handle the process of storing a practise
	 * 
	 * @return 
	 */
    public function store(PractiseStoreRequest $request)
    {
		try {
	    	return $this->customResponse(new PractiseResource($request->handle()), Response::HTTP_OK, 'Authenticated was successful.');
		} catch (\Exception $e) {
	    	return $this->customResponse('', Response::HTTP_UNPROCESSABLE_ENTITY, $e->getMessage());
		}
    }
}
