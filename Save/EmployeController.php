<?php

namespace App\Http\Controllers;

use App\Employe;
use App\Progression;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeRequest;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employes = Employe::oldest('nom_employe')->paginate(7);
        $progres = Progression::all();

        return view('employes.index',compact('employes','progres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeRequest $employeRequest)
    {
        //
        Employe::create($employeRequest->all());
        return redirect()->route('employes.index')->with('info','L\'employé a été bien enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
        $progres=Progression::all();
        view('progressions.show',compact('progres','employe'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        //
        return view('employes.edit',compact('employe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeRequest $employeRequest, Employe $employe)
    {
        //

        $employe->update($employeRequest->all());

        return redirect()->route('employes.index')->with('info','les infos sur l\'employe ont bien été modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        //
    }
}
