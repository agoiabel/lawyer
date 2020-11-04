<?php

namespace App\Http\Controllers;

use App\Classes\Firebase;

use Illuminate\Http\Request;
use App\Http\Resources\AuthUserResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\PasswordResetFormRequest;
use App\Http\Requests\PasswordResetUpdateFormRequest;

class PasswordResetController extends BaseApiController
{
	/**
	 * Handle the process of reseting password
	 *
	 * @return
	 */
    public function store(PasswordResetFormRequest $request)
    {
		try {
	    	return $this->customResponse(new AuthUserResource($request->handle()), Response::HTTP_OK, 'Password Code Was Sent Successful, Please check your email');
		} catch (\Exception $e) {
	    	return $this->customResponse('', Response::HTTP_UNPROCESSABLE_ENTITY, 'Email not found.');
		}
    }

    /**
     * Handle the process of updating a password
     *
     * @param  PasswordUpdateFormRequest $request
     * @return
     */
    public function update(PasswordResetUpdateFormRequest $request)
    {
		try {
	    	return $this->customResponse($request->handle(), Response::HTTP_OK, 'Password update Successful');
		} catch (\Exception $e) {
	    	return $this->customResponse(false, Response::HTTP_UNPROCESSABLE_ENTITY, 'Error updating password');
		}
    }

}
