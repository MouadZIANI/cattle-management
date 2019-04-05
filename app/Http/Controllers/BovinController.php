<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Achat;
use App\Models\Poid;
use Carbon\Carbon;
use PDF;

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
        $bovin = Bovin::findOrFail($id);
        $bovin->delete();
        
        session()->flash('success', 'Le bovin à ete supprimé avec succès !');
        return redirect()->back();
    }

    public function availableBovin()
    {
        return view('cherches.index', [
            'bovins' => Bovin::where('statut', 'Actif')->get(),
            'pourcentage' => 20
        ]);
    }

    public function searchAvailableBovin(Request $request)
    {
        $request->validate([
            'from' => 'required|numeric',
            'to' => 'required|numeric',
            'nbre' => 'required|numeric',
            'pourcentage' => 'required|numeric'
        ]);
        $nbre = 0;
        $bovins = [];
        foreach (Bovin::where('statut', 'Actif')->get() as $key => $bovin) {
            if($nbre > $request->nbre)
                break;
            if(($bovin->poidsActuel >= $request->from) && ($bovin->poidsActuel <= $request->to)){
                $bovins[] = $bovin;
                $nbre++;
            }
        }
        return view('cherches.index', [
            'bovins' => $bovins,
            'from' => $request->from,
            'to' => $request->to,
            'nbre' => $request->nbre,
            'pourcentage' => $request->pourcentage,
        ]);
    }

    public function exportAvailableBovins()
    {
        if(request()->input('from') && request()->input('to') && request()->input('nbre') && request()->input('pourcentage')) {
            $nbre = 0;
            $bovins = [];
            foreach (Bovin::where('statut', 'Actif')->get() as $key => $bovin) {
                if($nbre > request()->input('nbre'))
                    break;
                if(($bovin->poidsActuel >= request()->input('from')) && ($bovin->poidsActuel <= request()->input('to'))){
                    $bovins[] = $bovin;
                    $nbre++;
                }
            }
            $pdf = PDF::loadView('exports.available-bovins', [
                'bovins' => $bovins,
                'from' => request()->input('from'),
                'to' => request()->input('to'),
                'date' => Carbon::now(),
                'pourcentage' => request()->input('pourcentage')
            ]);
        } else {
            $pdf = PDF::loadView('exports.available-bovins', [
                'bovins' => Bovin::where('statut', 'Actif')->get(),
                'from' => null,
                'to' => null,
                'date' => Carbon::now(),
                'pourcentage' => 20
            ]);
        }
        
        return $pdf->download('bovins.pdf');
    }
}
