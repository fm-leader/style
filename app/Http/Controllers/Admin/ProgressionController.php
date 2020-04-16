<?php

namespace App\Http\Controllers\Admin;

use App\Commande;
use App\Employe;
use App\Progression;
use Illuminate\Http\Request;
use App\Http\Requests\ProgressionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class ProgressionController extends Controller
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
    public function index(Guard $auth,$commande_id = null)
    {
        //
        $nbre_progression=Progression::select('id')->count();
        //$progressions = Progression::orderBy('id','desc')->with('employe','commande')->paginate(10);


        //$clientels = Client::all();

        $progressiones = Progression::all();

        $commandes=Commande::all();

        //Progression::orderBy('id','desc')->whereCommande_id(48)->with('employe','commande')->get()

        $query = $commande_id  ? Progression::orderBy('id','desc')->whereCommande_id($commande_id) : Progression::orderBy('id','desc');
        $progressions = $query->with('employe','commande')->paginate(10);

        //$employes = Employe::all();
        //$commandes = Commande::all();
        return view('admin.progressions.index',compact('progressions','employes','auth','commandes','nbre_progression','lib_progres','progressiones','commande_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nbre_progression=Progression::select('id')->count();
        $progressions=Progression::pluck('lib_progres');
        $employe=Employe::pluck('nom_employe','id');
        $commande=Commande::pluck('lib_cmd','id');

        //$progressions=Progression::with('employe','commande')->get();
        $progression = new Progression();
        //dd($progressions);

        return view('admin.progressions.create',compact('progression','progressions','employe','commande','nbre_progression'));
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
        //['lib_progres','datdeb_progres','prix_progres','datfin_progres','materiel_progres','employe_id','commande_id']

        // dd($progressions);

        $progression=new Progression;
        //dd($progression);
        // $lib_progres=Progression::where('id','=',$ProgressionRequest->lib_progres)->select('lib_progres')->firstOrFail();
        //dd($lib_progres->lib_progres);

        $progression->lib_progres=$ProgressionRequest->lib_progres;
        $progression->datdeb_progres=$ProgressionRequest->datdeb_progres;
        $progression->datfin_progres=$ProgressionRequest->datfin_progres;
        $progression->prix_progres=$ProgressionRequest->prix_progres;
        $progression->materiel_progres=$ProgressionRequest->materiel_progres;
        $progression->Employe()->associate($ProgressionRequest->employe_id);
        $progression->Commande()->associate($ProgressionRequest->commande_id);
        $progression->save();

        return redirect()->route('progressions.index')->with('info','La progression a ete bien enregistree.');
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
        $nbre_progression=Progression::select('id')->count();

        $employes = Employe::all();
        $commandes = Commande::all();
        return view('admin.progressions.show',compact('progression','employes','commandes','nbre_progression'));
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
        //
        $nbre_progression=Progression::select('id')->count();
        $progressions=Progression::pluck('lib_progres');
        $employe=Employe::pluck('nom_employe','id');
        $commande=Commande::pluck('lib_cmd','id');

        //$progressions=Progression::with('employe','commande')->get();
        $progression = new Progression();
        //dd($progressions);

        $nbre_progression=Progression::select('id')->count();

        return view('admin.progressions.edit',compact('progression','progressions','employe','commande','nbre_progression'));
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
        $progression->update($ProgressionRequest->all());

        return redirect()->route('progressions.index')->with('info','La progression a ete bien Modifiee.');
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
        $progression->delete();

        return redirect()->route('progressions.index')->with('info','La Progression a bien ete suprimee');
    }
}
