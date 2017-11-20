<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Store as RequestStore;
use App\Pipelines\User\Store;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param RequestStore $request
     *
     * @return JsonResponse
     */
    public function store(RequestStore $request)
    {
        // hash the password
        $request['password'] = bcrypt($request->get('password'));

        // instantiate the pipe
        $pipeline = new Store();
        $pipeline->fill($request);
        // flush the pipe
        $result = $pipeline->flush();

        // handle the response
        return response()
            ->json($result)
            ->setStatusCode($result['code']);
    }
}
