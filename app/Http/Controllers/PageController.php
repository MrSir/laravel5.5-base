<?php

namespace App\Http\Controllers;

use App\Http\Requests\Page\Index as RequestIndex;
use App\Http\Requests\Page\Store as RequestStore;
use App\Http\Requests\Page\Update as RequestUpdate;
use App\Http\Requests\Page\Destroy as RequestDestroy;
use App\Http\Requests\Page\Render as RequestRender;
use App\Models\Page;
use App\Pipelines\Page\Index;
use App\Pipelines\Page\Store;
use App\Pipelines\Page\Update;
use App\Pipelines\Page\Destroy;
use App\Pipelines\Page\Render;
use Illuminate\Http\JsonResponse;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param RequestIndex $request
     *
     * @return JsonResponse
     */
    public function index(RequestIndex $request)
    {
        // instantiate the pipeline
        $pipeline = new Index();
        $pipeline->fill($request);

        // flush the pipe
        $result = $pipeline->flush();

        // handle the response
        return response()
            ->json($result)
            ->setStatusCode($result['code']);
    }

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
     * @param Page          $page
     *
     * @return JsonResponse
     */
    public function update(RequestUpdate $request, Page $page)
    {
        // instantiate the pipeline
        $pipeline = new Update();
        $pipeline->fill(
            $request,
            $page
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
     * @param Page           $page
     *
     * @return JsonResponse
     */
    public function destroy(RequestDestroy $request, Page $page)
    {
        // instantiate the pipeline
        $pipeline = new Destroy();
        $pipeline->fill(
            $request,
            $page
        );
        // flush the pipe
        $result = $pipeline->flush();

        // handle the response
        return response()
            ->json($result)
            ->setStatusCode($result['code']);
    }

    /**
     * Render a given page.
     *
     * @param RequestRender $request
     *
     * @return JsonResponse
     */
    public function render(RequestRender $request)
    {
        // instantiate the pipeline
        $pipeline = new Render();
        $pipeline->fill($request);

        // flush the pipe
        $result = $pipeline->flush();

        return response($result['view'])
            ->setStatusCode($result['code']);
    }
}
