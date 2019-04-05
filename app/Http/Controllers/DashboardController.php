<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Visite;
use App\Models\Frais;
use App\Models\Pert;
use App\Models\Achat;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countBouvins = Bovin::all()->count();
        $countEnQuarantineBouvins = Bovin::where('statut', 'En quarantine')->count();
        $countActifBouvins = Bovin::where('statut', 'Actif')->count();
        $countNonActifBouvins = Bovin::where('statut', 'Non actif')->count();
        $countPertsBouvins = Pert::all()->count();
        $countAchats = Achat::all()->count();
        $currentMonth = date('m');
        $totalDepanceForThisMonth = Frais::whereRaw('MONTH(created_at) = ?', [$currentMonth])->sum('montant');
        $countVisites = Visite::whereRaw('MONTH(created_at) = ?', [$currentMonth])->count();

        // Listings
        $lastBovins = Bovin::take(10)->get();
        $lastAchats = Achat::take(10)->get();

        return view('dashboard.index', compact('countBouvins', 'countEnQuarantineBouvins', 'countActifBouvins', 'countNonActifBouvins', 'countPertsBouvins', 'countAchats', 'countVisites', 'totalDepanceForThisMonth', 'lastBovins', 'lastAchats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
