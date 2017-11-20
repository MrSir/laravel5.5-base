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
use App\Traits\Caching;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    use Caching;

    /**
     * Display a listing of the resource.
     *
     * @param RequestIndex $request
     *
     * @return JsonResponse
     */
    public function index(RequestIndex $request)
    {
        // check if we have a cached result and send it back instead
        $result = $this->checkCache(
            'page.index',
            $request->all()
        );

        // if no cached object found
        if (is_null($result)) {
            // instantiate the pipeline
            $pipeline = new Index();
            $pipeline->fill($request);

            // flush the pipe
            $result = $pipeline->flush();

            // cache the result
            $this->addToCache(
                'page.index',
                $request->all(),
                $result
            );
        }

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

        Cache::forget('page.index');

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

        Cache::forget('page.index');

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

        Cache::forget('page.index');

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
        // check if we have a cached result and send it back instead
        $result = $this->checkCache(
            'page.render',
            $request->all()
        );

        // if no cached object found
        if (is_null($result)) {
            // instantiate the pipeline
            $pipeline = new Render();
            $pipeline->fill($request);

            // flush the pipe
            $result = $pipeline->flush();

            // cache the result
            $this->addToCache(
                'page.render',
                $request->all(),
                $result['view']->render()
            );

            return response($result['view'])
                ->setStatusCode($result['code']);
        }

        return response($result)
            ->setStatusCode(200);
    }
}
