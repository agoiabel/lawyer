<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthFormRequest;
use App\Http\Resources\AuthUserResource;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends BaseApiController
{
	/**
	 * Handle the process of authenticating user
	 *
	 * @return
	 */
	public function store(AuthFormRequest $request)
	{
		try {
	    	return $this->customResponse(new AuthUserResource($request->handle()), Response::HTTP_OK, 'Authenticated was successful.');
		} catch (\Exception $e) {
	    	return $this->customResponse('', Response::HTTP_UNPROCESSABLE_ENTITY, $e->getMessage());
		}
	}
}