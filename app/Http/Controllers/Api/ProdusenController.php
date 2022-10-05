<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produsen;
use Illuminate\Http\Request;
use App\Http\Resources\ProdusenResource;

class ProdusenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produsen = Produsen::all();
        return ProdusenResource::collection($produsen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produsen = Produsen::create($request->all());

        return new ProdusenResource($produsen);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produsen  $produsen
     * @return \Illuminate\Http\Response
     */
    public function show(Produsen $produsen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produsen  $produsen
     * @return \Illuminate\Http\Response
     */
    public function edit(Produsen $produsen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produsen  $produsen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produsen $produsen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produsen  $produsen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produsen $produsen)
    {
        //
    }
}
