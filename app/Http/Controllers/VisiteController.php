<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinaire;
use App\Models\Bovin;
use App\Models\StockElement;
use App\Models\Visite;
use App\Models\Frais;
use App\Models\Ordonnance;

class VisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('visite.index', [
            'visites' => Visite::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visite.create', [
            'veterinaires' => Veterinaire::select('id', 'nom')->get(),
            'bovins' => Bovin::select('id', 'num', 'statut')->get(),
            'medicaments' => StockElement::where('type', 'Medicaments')->get()
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
            $visite = Visite::create([
                'bovin_id' => $request->bovin[$key], 
                'veterinaire_id' => $request->veterinaire_id, 
                'type' => $request->type, 
                'date' => $request->date, 
                'prix' => $request->prix, 
                'observation' => $request->observation
            ]);
            Frais::create([
                'bovin_id' => $visite->bovin_id, 
                'type' => 'Visite', 
                'montant' => $request->prix, 
                'date' => $request->date, 
                'observation' => 'Visite du bovin', 
                'model_id' => $visite->id
            ]);
            foreach ($request->medicament[$key] as $keyItem => $value) {
                $ordonnance = Ordonnance::create([
                    'medicament_id' => $request->medicament[$key][$keyItem], 
                    'visite_id' => $visite->id, 
                    'qte' => $request->qte[$key][$keyItem], 
                    'posologie' => $request->posologie[$key][$keyItem], 
                    'date' => $request->date
                ]);
                $medicament = StockElement::find($request->medicament[$key][$keyItem]);
                Frais::create([
                    'bovin_id' => $visite->bovin_id, 
                    'type' => 'Medicament Ordonnace', 
                    'montant' => $medicament->prix * $request->qte[$key][$keyItem], 
                    'date' => $request->date, 
                    'observation' => 'Consomation de medicament', 
                    'model_id' => $ordonnance->id
                ]);
            }
        }

        session()->flash('success', 'Visite à été enregistré avec succès !');
        return redirect()->route('visite.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('visite.show', [
            'visite' => Visite::findOrFail($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visite = Visite::findOrFail($id);
        $visite->delete();

        session()->flash('success', 'Visite à été supprimé avec succès !');
        return redirect()->route('visite.index');
    }
}
