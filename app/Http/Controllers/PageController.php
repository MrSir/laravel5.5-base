<?php

namespace App\Http\Controllers;

use App\Http\Requests\Page\Index as RequestIndex;
use App\Http\Requests\Page\Store as RequestStore;
use App\Models\Page;
use App\Pipelines\Page\Index;
use App\Pipelines\Page\Store;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * Display the specified resource.
     *
     * @param  \App\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Page                $page
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
