<?php

namespace App\Http\Controllers;

use App\Element;
use App\Http\Requests\Element\Store as RequestStore;
use App\Pipelines\Element\Store;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * Display the specified resource.
     *
     * @param  \App\Element $element
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Element $element)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Element $element
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Element $element)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Element             $element
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Element $element)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Element $element
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Element $element)
    {
        //
    }
}
