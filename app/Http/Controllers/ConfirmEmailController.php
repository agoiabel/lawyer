<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\EmailConfirmUpdateFormRequest;

class ConfirmEmailController extends BaseApiController
{
	/**
	 * Handle the process of displaying email 
	 * 
	 * @return 
	 */
    public function store(EmailConfirmUpdateFormRequest $request)
    {
    	$status = false;

    	try {
	    	$status = $request->handle();
    	} catch (\Exception $e) {}

	    return $this->customResponse($status, Response::HTTP_OK, 'Email confirmation');
    }
}
