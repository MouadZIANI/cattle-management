<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Pert;

class PertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pert.index', [
            'perts' => Pert::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pert.create', [
            'bovins' => Bovin::select('id', 'num', 'statut')->get()
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
            Pert::create([
                'bovin_id' => $bovin, 
                'type' => $request->type[$key], 
                'date' => $request->date[$key],  
                'observation' => $request->observation[$key], 
            ]);
        }
        session()->flash('success', 'Les bovins sont ajoutées au pert aves succès !');

        return redirect()->route('pert.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
