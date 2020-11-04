<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupFormRequest;
use App\Http\Resources\AuthUserResource;
use Symfony\Component\HttpFoundation\Response;

class SignupController extends BaseApiController
{
	/**
	 * Handle the process of storing new password
	 *
	 * @return
	 */
    public function store(SignupFormRequest $request)
    {
		try {
    		return $this->customResponse(new AuthUserResource($request->handle()), Response::HTTP_OK, 'Thanks. We’ve sent a verification link to your email address');
		} catch (\Exception $e) {
	    	return $this->customResponse('', Response::HTTP_UNPROCESSABLE_ENTITY, $e->getMessage());
		}
    }
}
