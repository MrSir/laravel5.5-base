<?php

namespace App\Http\Controllers;

use App\Http\Requests\Site\Destroy as RequestDestroy;
use App\Http\Requests\Site\Index as RequestIndex;
use App\Http\Requests\Site\Store as RequestStore;
use App\Http\Requests\Site\Update as RequestUpdate;
use App\Models\Site;
use App\Pipelines\Site\Destroy;
use App\Pipelines\Site\Index;
use App\Pipelines\Site\Store;
use App\Pipelines\Site\Update;
use App\Traits\Caching;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

/**
 * Class SiteController
 * @package App\Http\Controllers
 */
class SiteController extends Controller
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
            'site.index',
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
                'site.index',
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
        $pipeline = new Store();
        $pipeline->fill($request);
        // flush the pipe
        $result = $pipeline->flush();

        Cache::forget('site.index');

        // handle the response
        return response()
            ->json($result)
            ->setStatusCode($result['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return JsonResponse
     */
    public function show(int $id)
    {
        // check if we have a cached result and send it back instead
        $result = $this->checkCache(
            'site.show',
            ['id' => $id]
        );

        if (is_null($result)) {
            $result = Site::find($id);

            // cache the result
            $this->addToCache(
                'site.show',
                ['id' => $id],
                $result
            );
        }

        return response()
            ->json($result)
            ->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RequestUpdate $request
     * @param Site          $site
     *
     * @return JsonResponse
     */
    public function update(RequestUpdate $request, Site $site)
    {
        // instantiate the pipeline
        $pipeline = new Update();
        $pipeline->fill(
            $request,
            $site
        );
        // flush the pipe
        $result = $pipeline->flush();

        Cache::forget('site.index');

        // handle the response
        return response()
            ->json($result)
            ->setStatusCode($result['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RequestDestroy $request
     * @param Site           $site
     *
     * @return JsonResponse
     */
    public function destroy(RequestDestroy $request, Site $site)
    {
        // instantiate the pipeline
        $pipeline = new Destroy();
        $pipeline->fill(
            $request,
            $site
        );
        // flush the pipe
        $result = $pipeline->flush();

        Cache::forget('site.index');

        // handle the response
        return response()
            ->json($result)
            ->setStatusCode($result['code']);
    }
}
