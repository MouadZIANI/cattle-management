<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockElement;
use App\Models\Fournisseur;
use App\Models\BovinTransport;
use App\Models\Transport;
use App\Models\Bovin;
use App\Models\Frais;
use App\Models\Achat;
use Carbon;
class StockElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(' stockelement.index',[
            'stockElements'=>StockElement::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stockElement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       foreach ($request->designation as $key => $num) {
            $stock = StockElement::create([ 
                'designation' => $request->designation[$key], 
                'type' =>  $request->type[$key],
                'qte' => $request->qte[$key],
                'prix' => $request->prix[$key]
            ]);
            $frais = Frais::create([
                'bovin_id' => null, 
                'type' => $stock->type, 
                'montant' => $stock->qte * $stock->prix, 
                'date' => Carbon\Carbon::now(), 
                'observation' => 'Mise a jour de stock', 
                'model_id' => $stock->id
            ]); 
        }
        session()->flash('success', 'Stock Element à été enregistré avec succès !');

        return redirect()->route('stockelement.index');
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
        $stock = StockElement::find($id);
        $stock->delete();
        session()->flash('success', 'Stock Element à été Supprimer avec succès !');

        return redirect()->route('stockelement.index');
    }
}
