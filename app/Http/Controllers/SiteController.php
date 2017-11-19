<?php

namespace App\Http\Controllers;

use App\Http\Requests\Site\Index as RequestIndex;
use App\Http\Requests\Site\Store as RequestStore;
use App\Models\Site;
use App\Pipelines\Site\Index;
use App\Pipelines\Site\Store;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * Display the specified resource.
     *
     * @param  \App\Site $site
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site $site
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Site                $site
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site $site
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}
