<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fournisseur.index', [
            'fournisseurs' => Fournisseur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fournisseur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fournisseur = new Fournisseur();
        $fournisseur->nom = $request->input('nome');
        $fournisseur->tel = $request->input('telephone');
        $fournisseur->email = $request->input('email');
        $fournisseur->adresse = $request->input('adresse');
        $fournisseur->save();

        session()->flash('success', 'Fournisseur à été enregistré avec succès !');
        return redirect()->route('fournisseur.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        return view('fournisseur.show', [
            'fournisseur' => $fournisseur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('fournisseur.edit', [
            'fournisseur' => Fournisseur::find($id)
        ]);
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
        $fournisseur = Fournisseur::find($id);
        $fournisseur->nom = $request->input('nome');
        $fournisseur->tel = $request->input('telephone');
        $fournisseur->email = $request->input('email');
        $fournisseur->adresse = $request->input('adresse');
        $fournisseur->save();

        session()->flash('success', 'Fournisseur à été Modifier avec succès !');
        return redirect()->route('fournisseur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fournisseur = Fournisseur::find($id);
        
        $fournisseur->delete();

        session()->flash('success', 'Fournisseur à été sup avec succès !');
        return redirect()->route('fournisseur.index');
    }
}
