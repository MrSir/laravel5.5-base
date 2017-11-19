<?php

namespace App\Http\Controllers;

use App\Http\Requests\Element\Store as RequestStore;
use App\Http\Requests\Element\Update as RequestUpdate;
use App\Http\Requests\Element\Destroy as RequestDestroy;
use App\Models\Element;
use App\Pipelines\Element\Store;
use App\Pipelines\Element\Update;
use App\Pipelines\Element\Destroy;
use Illuminate\Http\JsonResponse;

/**
 * Class ElementController
 * @package App\Http\Controllers
 */
class ElementController extends Controller
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
        // instantiate the pipe
        $pipe = new Store();
        $pipe->fill($request);
        // flush the pipe
        $result = $pipe->flush();

        // handle the response
        return response()
            ->json($result)
            ->setStatusCode($result['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RequestUpdate $request
     * @param Element       $element
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(RequestUpdate $request, Element $element)
    {
        // instantiate the pipe
        $pipeline = new Update();
        $pipeline->fill(
            $request,
            $element
        );
        // flush the pipe
        $result = $pipeline->flush();

        // handle the response
        return response()
            ->json($result)
            ->setStatusCode($result['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RequestDestroy $request
     * @param Element        $element
     *
     * @return JsonResponse
     */
    public function destroy(RequestDestroy $request, Element $element)
    {
        // instantiate the pipeline
        $pipeline = new Destroy();
        $pipeline->fill(
            $request,
            $element
        );
        // flush the pipe
        $result = $pipeline->flush();

        // handle the response
        return response()
            ->json($result)
            ->setStatusCode($result['code']);
    }
}
