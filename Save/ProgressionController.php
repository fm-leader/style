<?php

namespace App\Http\Controllers;

use App\Employe;
use App\Progression;
use Illuminate\Http\Request;
use App\Http\Requests\ProgressionRequest;
class ProgressionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $progressions = Progression::oldest('lib_progres')->pagninate(7);
        $employes = Employe::all();
        return view('progressions.index',compact('progressions','employes'));
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
    public function store(ProgressionRequest $ProgressionRequest)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Progression $progression)
    {
        //

        $employes = Employe::all();
        return view('progressions.show',compact('progression','employes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Progression $progression)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgressionRequest $ProgressionRequest, Progression $progression)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progression $progression)
    {
        //
    }
}
