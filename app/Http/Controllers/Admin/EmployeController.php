<?php

namespace App\Http\Controllers\Admin;

use App\Employe;
use App\Progression;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class EmployeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Guard $auth,$telephone_employe = null)
    {
        //
        $nbre_employe=Employe::select('id')->count();
        //$employes = Employe::orderBy('nom_employe','desc')->with('progressions')->paginate(7);
        //$progres = Progression::all();


        $employers = Employe::all();

        //$commande=Commande::all();


        $employes = $telephone_employe ? Employe::whereTelephone_employe($telephone_employe)->with('progressions')->get() : Employe::orderBy('nom_employe','asc')->with('progressions')->paginate(7);
        //$commandes = $query->orderBy('id','desc')->paginate(7);



        return view('admin.employes.index',compact('employes','auth','nbre_employe','employers','telephone_employe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Guard $auth)
    {
        //
        $nbre_employe=Employe::select('id')->count();
        $employe = new Employe();
        return view('admin.employes.create',compact('auth','employe','nbre_employe'));
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
        //dd("Je suis dans la methode store du controller");
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
        $nbre_employe=Employe::select('id')->count();
        $progres=Progression::all();
        view('employes.show',compact('progres','employe','nbre_employe'));

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
        $nbre_employe=Employe::select('id')->count();
        return view('admin.employes.edit',compact('employe','nbre_employe'));
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

        return redirect()->route('admin.employes.index')->with('info','les infos sur l\'employe ont bien été modifié');

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
        $employe->delete();

        return redirect()->route('employes.index')->with('info','L\'employe ont bien été supprimé');

    }
}
