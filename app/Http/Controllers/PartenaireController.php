<?php

namespace App\Http\Controllers;

use App\Enrolement;
use App\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole(['Admin', 'Superviseur']))
        {
            //dd('have admin or Superviseur');

            $result = Partenaire::all();

        }

        else{

            //dd('have partenaire');
            $user = Auth::user();
            $result = Partenaire::where('user_id',$user->id )->get();

        }



        //$result = Partenaire::all();
        return view('partenaires.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partenaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Partenaire $partenaire)
    {
        //dd($request->all());

        //$enrolement = Enrolement::where('ref', $request->input('enrolement_ref'))->first();

        //$nom = $enrolement->name.' '.$enrolement->surname;
        //dd($enrolement);


        //dd($enrolement);
        /*dd($request->all());*/
        $this->validate($request, [

            'enrolement_ref' => ['required'],
            'montant' => ['required'],
            'premise' => ['required'],
            /*'remise' => ['required'],*/
            /* 'user_id' => ['required'],*/
        ]);
        $remise = $request->input('montant')*$request->input('premise')/100;
        //dd($remise);
        $user = Auth::user();

        $partenaire->enrolement_ref = $request->input('enrolement_ref');
        $partenaire->montant = $request->input('montant');
        $partenaire->premise = $request->input('premise');
        $partenaire->remise = $remise;
        $partenaire->user_id = $user->id;
        $partenaire->save();

        $enrolement = Enrolement::where('ref', $request->input('enrolement_ref'))->first();
        $nom = $enrolement->name .' '.$enrolement->surname;

        return redirect()->route('partenaires.index')->with('success','Une rémise d\' montant de '.$remise. ' a été accordée au client nommé '.$nom);

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
