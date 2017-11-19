<?php

namespace App\Http\Controllers;

use App\Http\Requests\Site\Index as RequestIndex;
use App\Http\Requests\Site\Store as RequestStore;
use App\Http\Requests\Site\Update as RequestUpdate;
use App\Http\Requests\Site\Destroy as RequestDestroy;
use App\Models\Site;
use App\Pipelines\Site\Index;
use App\Pipelines\Site\Store;
use App\Pipelines\Site\Update;
use App\Pipelines\Site\Destroy;
use Illuminate\Http\JsonResponse;

/**
 * Class SiteController
 * @package App\Http\Controllers
 */
class SiteController extends Controller
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
        $pipeline = new Store();
        $pipeline->fill($request);
        // flush the pipe
        $result = $pipeline->flush();

        // handle the response
        return response()
            ->json($result)
            ->setStatusCode($result['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Site $site
     *
     * @return JsonResponse
     */
    public function show(Site $site)
    {
        return response()
            ->json($site)
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

        // handle the response
        return response()
            ->json($result)
            ->setStatusCode($result['code']);
    }
}
