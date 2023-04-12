<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $msg = "votre inscription a bien été enregistrée";
        if ($request->reste_a_vivre >= 1200) {
            $msg = "Tu as besoin d'une etude pour diminuer votre consomation 'un de nos experts va vous contacter dans la 24h suivante'. ";
        } elseif ($request->situation_familiale == 1 && $request->montant_facture >= 1400 || $request->situation_familiale == 0 && $request->montant_facture >= 1400) {
            $msg = "Tu as besoin d'une etude pour diminuer votre consomation 'un de nos experts va vous contacter dans la 24h suivante'. ";
        } else {
            $msg = 'Felicitation votre consomation est dans les normes !! ';
        };
        // dd( $request->situation_familiale ? 'mjowej' : 'mhani raso');
        // dd($request->post());
        Client::create($request->post());
        return view('client.thank', compact('msg'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        if (Auth::user()->role_id == 1 ||  Auth::user()->role_id == 2) {
            return view('client.edit', compact('client'));
        };
        return abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client)
    {
        if (Auth::user()->role_id == 1 ||  Auth::user()->role_id == 2) {
            $client->fill($request->post())->save();
            return redirect()->route('client.index')->with('info', 'Client a été bien modifié');
        };
        return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if (Auth::user()->role_id == 1) {
            $client->delete();
            return redirect()->route('client.index')->with('danger', 'Client a été bien supprimé');
        };
        return abort(403);
    }
}
