<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinaire;

class VeterinaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('veterinaire.index', [
            'veterinaires' => Veterinaire::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veterinaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $veterinaire = new Veterinaire();
        $veterinaire->nom = $request->input('nome');
        $veterinaire->tel = $request->input('telephone');
        $veterinaire->email = $request->input('email');
        $veterinaire->save();

        session()->flash('success', 'Veterinaire à été enregistré avec succès !');
        return redirect()->route('veterinaire.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $veterinaire = Veterinaire::findOrFail($id);
        return view('veterinaire.show', [
            'veterinaire' => $veterinaire
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
        return view('veterinaire.edit', [
            'veterinaire' => Veterinaire::find($id)
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
        $veterinaire = Veterinaire::find($id);
        $veterinaire->nom = $request->input('nome');
        $veterinaire->tel = $request->input('telephone');
        $veterinaire->email = $request->input('email');
        $veterinaire->save();

        session()->flash('success', 'Veterinaire à été modofier avec succès !');
        return redirect()->route('veterinaire.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veterinaire = Veterinaire::findOrFail($id);
        $veterinaire->delete();
        session()->flash('success', 'Veterinaire à été sup avec succès !');
        
        return redirect()->route('veterinaire.index');
    }
}
