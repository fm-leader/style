<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Commande;
use App\Modele;
use App\Progression;
use App\Client;
use Illuminate\Pagination;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\ClientRequest;
use Illuminate\Console\Command;

class ClientController extends Controller
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
    public function index(Guard $auth,$contact_client = null)
    {
        //
        $nbre_client=Client::select('id')->count();

        //$clients=Client::oldest('nom_client')->paginate(7);
        $clientels = Client::all();

        $commande=Commande::all();


        $clients = $contact_client ? Client::whereContact_client($contact_client)->get() : Client::orderBy('nom_client','asc')->paginate(7);
        //$commandes = $query->orderBy('id','desc')->paginate(7);




        return view('admin.clients.index',compact('clients','commande','auth','nbre_client','clientels','nom_client','contact_client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nbre_client=Client::select('id')->count();
        $client = new Client();
        return view('admin.clients.create',compact('client','nbre_client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $ClientRequest)
    {
        //
        Client::create($ClientRequest->all());
        return redirect()->route('clients.index')->with('info','Le Client a bien ete  enregistre');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
        $nbre_client=Client::select('id')->count();
        $commandes=Commande::all();
        $modeles=Modele::all();
        $progres=Progression::all();
        $nbre_cmd_client=$client->commandes()->select('lib_cmd')->count();
        $info_cmd_client=$client->commandes()->select('lib_cmd','description_cmd','modele_id','echantillon_cmd','rdv_cmd','prix_cmd')->get();
        //$modele_cl=Modele::where('id','=',$info_cmd_client->modele_id)->select('image_modele')->value('image_modele');

        //dd($modele_cl);

        return view('admin.clients.show',compact('commandes','modeles','progres','client','nbre_client','nbre_cmd_client','info_cmd_client','modele_cl'));
        //return view('admin.modeles.show',compact('modele'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
        $nbre_client=Client::select('id')->count();
        return view('admin.clients.edit',compact('client','nbre_client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $ClientRequest, Client $client)
    {
        //
        $client->update($ClientRequest->all());

        return redirect()->route('clients.index')->with('info','les infos sur le Client ont bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();

        return redirect()->route('clients.index')->with('info','Le Client a bien été supprimé');
    }



    public function renvoye_mesure_client($id)
    {
        $client_id=$id;

        $message='Impossible de Restaurer.';

        $mesure_client=Commande::whereClient_id($client_id)->select('dimension_cmd')->value('dimension_cmd');
        //dd($mesure_client);
        /*
        if($mesure_client != null){

            $mesure_client->

            $message='Ce client figure dans la base donnees .';
        }
        else{

            $message='Impossible de Restaurer.';
        }
*/
        return redirect()->route('commandes.create',$mesure_client);


    }


}
