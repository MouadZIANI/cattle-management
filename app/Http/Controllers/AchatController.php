<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\BovinTransport;
use App\Models\Transport;
use App\Models\Bovin;
use App\Models\Frais;
use App\Models\Achat;
use Carbon;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('achat.index', [
            'achats' => Achat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('achat.create', [
            'fournisseurs' => Fournisseur::select('id', 'nom')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $achat = Achat::create([
            'fournisseur_id' => $request->fournisseur_id, 
            'date_achat'=> $request->date_achat, 
            'observation' => $request->observation 
        ]);
        $transport = Transport::create([
            'type' => 'Achat des bovins', 
            'date' => $request->date_achat, 
            'nom_chaffeur' => $request->nom_chaffeur, 
            'matricule' => $request->matricule, 
            'tel' => $request->tel
        ]);

        foreach ($request->num as $key => $num) {
            $bovin = Bovin::create([
                'achat_id' => $achat->id, 
                'num' => $request->num[$key], 
                'sexe' => $request->sexe[$key], 
                'prix' => $request->prix[$key], 
                'poids_initial' => $request->poids_initial[$key], 
                'age_initial' => $request->age[$key], 
                'origine' => $request->origine[$key], 
                'statut' =>  $request->statut[$key]
            ]);
            $bovinTranport = BovinTransport::create([
                'bovin_id' => $bovin->id, 
                'transport_id' =>  $transport->id
            ]);
            Frais::create([
                'bovin_id' => $bovin->id, 
                'type' => 'Transport Achat', 
                'montant' => $request->frais, 
                'date' => $request->date_achat, 
                'observation' => 'Transport achat du bovin', 
                'model_id' => $bovinTranport->id
            ]);
        }
        session()->flash('success', 'Achat à été enregistré avec succès !');

        return redirect()->route('achat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
