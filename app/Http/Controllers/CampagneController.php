<?php

namespace App\Http\Controllers;

use App\Campagne;
use App\Enrolement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampagneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Campagne::all();

        return view('campagnes.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enrolements = Enrolement::all();
        return view('campagnes.create', compact('enrolements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Campagne $campagne)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => ['required'],
            'lnumero' => ['required'],
            'message' => ['required'],

        ]);
        //dd($request->all());

        //$listenumero = $request->input('lnumero');

        //dd($listenumero);

        //$ln = array($request->input('lnumero'));
        //$liste = implode(",", $listenumero);
        //dd($liste);
        //dd($ln);

        $user = Auth::user();
        $campagne->name = $request->input('name');
        $campagne->lnumero = implode(",", $request->input('lnumero'));
        $campagne->message = $request->input('message');
        $campagne->user_id = $user->id;

        $campagne->save();

        return redirect()->route('campagnes.index')->with('success','La campagne '.$campagne->name.' a été publiée avec succès');
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
