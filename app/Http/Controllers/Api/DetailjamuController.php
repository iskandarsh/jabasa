<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Detailjamu;
use Illuminate\Http\Request;
use App\Http\Resources\DetailjamuResource;

class DetailjamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailjamu = Detailjamu::all();
        return DetailjamuResource::collection($detailjamu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detailjamu = Detailjamu::create($request->all());

        return new DetailjamuResource($detailjamu);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detailjamu  $detailjamu
     * @return \Illuminate\Http\Response
     */
    public function show(Detailjamu $detailjamu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detailjamu  $detailjamu
     * @return \Illuminate\Http\Response
     */
    public function edit(Detailjamu $detailjamu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detailjamu  $detailjamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detailjamu $detailjamu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detailjamu  $detailjamu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detailjamu $detailjamu)
    {
        //
    }
}
