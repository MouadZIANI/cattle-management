<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockElement;
use App\Models\Bovin;
use App\Models\Nourriture;
use App\Models\Frais;

class NourritureController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nourriture.create', [
            'bovins' => Bovin::select('id', 'num', 'statut')->get(),
            'elements' => StockElement::where('type', 'Norritures')->get()
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
        foreach ($request->bovin as $key => $bovin) {
            $nourriture = Nourriture::create([
                'bovin_id' => $bovin, 
                'element_id' => $request->element[$key], 
                'qte' => $request->qte[$key],  
            ]);
            $element = StockElement::find($request->element[$key]);
            Frais::create([
                'bovin_id' => $nourriture->bovin_id, 
                'type' => 'Nourriture', 
                'montant' => $element->prix * $request->qte[$key], 
                'date' => $nourriture->created_at, 
                'observation' => 'Nourriture...', 
                'model_id' => $nourriture->id
            ]);
        }
        session()->flash('success', 'La nourriture à été enregistrer aves succès !');

        return redirect()->route('nourriture.create');
    }
}