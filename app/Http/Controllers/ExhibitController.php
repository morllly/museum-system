<?php

namespace App\Http\Controllers;

use App\Models\Exhibit;
use Illuminate\Http\Request;

class ExhibitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.exhibits.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exhibits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exhibit  $exhibit
     * @return \Illuminate\Http\Response
     */
    public function show(Exhibit $exhibit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exhibit  $exhibit
     * @return \Illuminate\Http\Response
     */
    public function edit(Exhibit $exhibit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exhibit  $exhibit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exhibit $exhibit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exhibit  $exhibit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exhibit $exhibit)
    {
        //
    }
}
