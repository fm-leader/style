<?php

namespace App\Http\Controllers;

use App\Modele;
//use Illuminate\Http\Request;
use App\Http\Requests\ModeleRequest;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $modeles = Modele::oldest('lib_modele')->paginate(7);

        dd($modeles);

        return view('modeles.index',compact('modeles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modeles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModeleRequest $ModeleRequest)
    {
        //

        Modele::create($ModeleRequest->all());

        return redirect()->route('modeles.index')->with('info','Le modele a bien été enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Modele $modele)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Modele $modele)
    {
        //

        return view('modeles.edit',compact($modele));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModeleRequest $ModeleRequest, Modele $modele)
    {
        //
        $modele->update($ModeleRequest->all());

        return redirect()->route('modeles.index')->with('info','Le model a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modele $modele)
    {
        //
    }
}
