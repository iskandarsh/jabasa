<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jamu;
use Illuminate\Http\Request;
use App\Http\Resources\JamuResource;

class JamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jamu = Jamu::all();
        return JamuResource::collection($jamu);
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
        $jamu = Jamu::create($request->all());

        return new JamuResource($jamu);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jamu  $jamu
     * @return \Illuminate\Http\Response
     */
    public function show(Jamu $jamu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jamu  $jamu
     * @return \Illuminate\Http\Response
     */
    public function edit(Jamu $jamu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jamu  $jamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jamu $jamu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jamu  $jamu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jamu $jamu)
    {
        //
    }
}
