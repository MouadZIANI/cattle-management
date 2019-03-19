<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Achat;
use App\Models\Poid;

class BovinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bovin.index', [
            'bovins' => Bovin::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bovin = Bovin::find($id);
        return view('bovin.show', [
            'bovin' => $bovin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bovin $bovin)
    {
        return view('bovin.edit', [
            'achats' => Achat::select('id')->get(),
            'bovin' => $bovin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bovin $bovin)
    {
        $bovin->update([
            'achat_id' => $request->achat_id, 
            'sexe' => $request->sexe, 
            'prix' => $request->prix, 
            'poids_initial' => $request->poids_initial, 
            'age_initial' => $request->age_initial, 
            'origine' => $request->origine,
            'statut' => $request->statut
        ]);
        $bovin->poids()->delete();
        foreach ($request->date as $key => $date) {
            Poid::create([
                'bovin_id' => $bovin->id, 
                'date' => $date, 
                'poids' => $request->poids[$key], 
                'observation' => $request->observation[$key]
            ]);
        }
        session()->flash('success', 'Les information du bovin sont enregistré avec succès !');

        return redirect()->back();
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
