<?php

namespace App\Http\Controllers\Admin;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Builder;


use App\Client;
use App\Commande;
use App\Modele;
use App\Payement;
use App\Progression;
use App\Employe;
use App\Livraison;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommandeRequest;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\PayementRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CommandeController extends Controller
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
        $nbre_cmd= Commande::select('id')->count();
        //$cmd = new Commande();
        //$clientel = new Client();
        $clientels = Client::all();
        $livraisons = Livraison::all();

        //$contact_client=$clientel->contact_client;
        //$livre_existe=Livraison::whereCommande_id($commande_id)->first();

        /*


        $query = $slug ? Category::whereSlug($slug)->firstOrFail()->films() : Film::query();
        $films = $query->withTrashed()->oldest('title')->paginate(5);
        $categories = Category::all();

        $query = $tel_client_choisir ? Client::whereContact_client($tel_client_choisir)->firstOrFail()->commandes() : Commande::query();
        $commandes=$query->orderBy('id','desc')->with('modele','client','payements')->paginate(7);


        */
        //$ClientRequest = new ClientRequest;
        //$contact_client=$ClientRequest->contact_client;
        //$contact_client;

        //$CommandeRequest = new CommandeRequest;

        //$contact_client = $CommandeRequest->$contact_client;
        //$contact_client=1;


        $query = $contact_client ? Client::whereContact_client($contact_client)->firstOrFail()->commandes() : Commande::with('modele','client','payements');
        $commandes = $query->orderBy('id','desc')->paginate(7);


        //$commandes = $contact_client ?  Commande::orderBy('id','desc')->whereClient_id($contact_client)->with('modele','client','payements')->paginate(7) : Commande::orderBy('id','desc')->with('modele','client','payements')->paginate(7);
        //dd($commandes);


        //$modeles=Modele::all();
        //dd($commandes);
        // $payements = Payement::with('commande')->select('mnt_paie','dat_paie')->get();
        //$payements = Payement::all();
        //$payements = $commandes->payements->select('mnt_paie','dat_paie')->get();
        //dd($payements);
        return view('admin.commandes.index',compact('commandes','auth','nbre_cmd','contact_client','clientels','livraisons'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Guard $auth)
    {
        //
        //$id= null;

        //$modeles=Modele::pluck('lib_modele','id');
        $modeles=Modele::all();
        //$clients=Client::pluck('nom_client','id');
        $clients=Client::all();

        //$mesure_client_existant =  Client::whereId($id)->firstOrFail()->commandes()->select('dimension_cmd')->value('dimension_cmd');
        //dd($mesure_client_existant);
        $nbre_cmd= Commande::select('id')->count();
        $commande = new Commande();
        $client = new Client();
        //$payement = $commande->payements()->select('mnt_paie','dat_paie')->get();
        $mesure_client= null;

        return view('admin.commandes.create',compact('modeles','auth','commande','clients','payement','nbre_cmd','mesure_client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommandeRequest $CommandeRequest)
    {
        //
        //
        /*
        $client = new Client;
        $client->nom_client= $ClientRequest->nom_client;
        $client->contact_client= $ClientRequest->contact_client;
        $client->save();



        $PayementRequest = new PayementRequest;
        $paye = new Payement;
        $paye->mnt_paie = 5000;
        $paye->dat_paie= Carbon::now();
        $paye->save();
        dd($paye);

        */

        // Extraction de l'identifiant du client dans la chaine issue de la route route('clients.commande_mesure', $client->id)
        $extrait_clientid=$CommandeRequest->client_id;
        $tab_extrait_clientid=explode('/',$extrait_clientid);
        $tab_extrait_clientid_last = end($tab_extrait_clientid);

        //dd($dernier);


        //$CommandeRequest = new CommandeRequest ;
        //dd("Je suis dans la methode store du controller");
        //$carbon_rdv= new Carbon();
        $carbon_rdv=$CommandeRequest->rdv_cmd;
        // dd($carbon_rdv);


        $nom_client=Client::where('id',$tab_extrait_clientid_last)->select('nom_client')->value('nom_client');


        $path_img_mod=explode('/',$CommandeRequest->modele_id);

        $modele_id=Modele::where('image_modele',$path_img_mod[count($path_img_mod)-1])->value('id');
        //dd($path_img_mod);
        $path = basename($CommandeRequest->echantillon_cmd->store('images'));

        $commande = new Commande;
        //dd($commande);
        //$commande->lib_cmd= $CommandeRequest->lib_cmd;
        $commande->date_cmd= Carbon::now();
        $commande->rdv_cmd= $carbon_rdv;

        $commande->prix_cmd= $CommandeRequest->prix_cmd;
        $commande->echantillon_cmd= $path;
        $commande->description_cmd = $CommandeRequest->description_cmd;
        //dd($commande);

        $title="cmd"." ".$nom_client." ".Carbon::now();
        $commande->lib_cmd= Str::slug($title);

        $commande->client()->associate($tab_extrait_clientid_last);
        $commande->modele()->associate($modele_id);
        $commande->save();
        //dd($commande);

        return redirect()->route('commandes.index')->with('info','La Commande a ete bien enregistree.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        //$progressions = Commande::find($commande->id)->progressions()->select('lib_progres','employe_id')->get();
        //$commande = Commande::with(['modele','client'])->where('id',$commande->id)->get();
        //$progres = $commande->progressions()->select('lib_progres')->get();
        //dd($progres);

        $nbre_cmd= Commande::select('id')->count();

        $progressions = Progression::with('employe')->where('commande_id',$commande->id)->select('lib_progres','employe_id')->get();
        $client = $commande->client()->where('id','=',$commande->client_id)->firstOrFail();
        $modele = $commande->modele()->where('id','=',$commande->modele_id)->firstOrFail();
        $payements = $commande->payements()->select('mnt_paie','dat_paie')->get();
        //$commande->payements()->select('mnt_paie')->first()
        //dd($payements);

        return view('admin.commandes.show',compact('commande','progressions','client','modele','payements','nbre_cmd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
        //$client = new Client();
        //$client =Client::where('id','=' ,$commande->client_id)->firstOrFail();
        //$clients=Client::pluck('nom_client','id');

        //dd($client);
        $nbre_cmd= Commande::select('id')->count();
        $clients=Client::all();
        $modeles=Modele::all();
        return view('admin.commandes.edit',compact('modeles','commande','clients','nbre_cmd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommandeRequest $CommandeRequest,Commande $commande)
    {
        //$commande = new Commande();
        $nom_client=Client::where('id',$CommandeRequest->client_id)->select('nom_client')->value('nom_client');
        $title="cmd"." ".$nom_client." ".Carbon::now();
        $commande->lib_cmd = Str::slug($title);

        //$commande->client()->associate($CommandeRequest->client_id);


        $path_img_mod=explode('/',$CommandeRequest->modele_id);
        $modele_id=Modele::where('image_modele',$path_img_mod[count($path_img_mod)-1])->value('id');
        $path = basename($CommandeRequest->echantillon_cmd->store('images'));
        $commande->echantillon_cmd= $path;


        $commande->update(['rdv_cmd'=>$CommandeRequest->rdv_cmd, 'echantillon_cmd'=>$CommandeRequest->echantillon_cmd,
            'prix_cmd'=>$CommandeRequest->prix_cmd, 'dimension_cmd'=>$CommandeRequest->dimension_cmd, 'lib_cmd'=>$commande->lib_cmd
            , 'modele_id'=>$modele_id , 'client_id'=>$CommandeRequest->client_id]);

        $commande->save();

        return redirect()->route('commandes.index')->with('info','La commande a bien ete modifiee.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        //
        $commande->delete();

        return redirect()->route('commandes.index')->with('info','La commande ont bien été suprimée');
    }


    /*
        public function forceDestroy($id)
        {
            Films::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
            return back()->with('info', 'Le film a bien ete supprime definitivement dans la base de donnees.');
        }

         */

    /*
       public function restore($id)
       {
           Films::withTrashed()->whereId($id)->firstOrFail()->restore();
           return back()->with('info', 'Le film a bien ete restaure.');
       }
    */

    public function livraison($id)
    {
        $commande_id=$id;

        $livre_existe=Livraison::whereCommande_id($commande_id)->first();
        if($livre_existe == null){
            $livraison = new Livraison();
            $livraison->dat_livre = Carbon::now();

            $livraison->commande()->associate($commande_id);
            //dd($livraison);
            $livraison->save();

            $message='La Commande a bien ete Livre.';
        }
        else{

            $message='La Commande a ete deja Livre.';


        }



        /*
                Commandes::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
                */
        return back()->with('info', $message);
    }



    public function livraison_restor($id)
    {
        $commande_id=$id;

        $livre_existe=Livraison::whereCommande_id($commande_id)->first();
        if($livre_existe != null){
            //$livraison = new Livraison();
            //$livraison->dat_livre = Carbon::now();

            //$livraison->commande()->dissociate();
            $livre_existe->delete();
            //$livraison->destroy($commande_id);
            //dd($livraison);
            //$livraison->save();

            $message='La Commande a bien ete Restauree.';
        }
        else{

            $message='Impossible de Restaurer.';
        }

        /*
                Commandes::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
                */
        return back()->with('info', $message);
    }







    public function renvoye_mesure_client($id)
    {
        $commande_id=$id;

        $livre_existe=Livraison::whereCommande_id($commande_id)->first();
        if($livre_existe != null){

            $livre_existe->delete();

            $message='La Commande a bien ete Restauree.';
        }
        else{

            $message='Impossible de Restaurer.';
        }

        return back()->with('info', $message);
    }




}
