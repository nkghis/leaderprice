<?php

namespace App\Http\Controllers;

use App\Enrolement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EnrolementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     /*   $result = Enrolement::all();
        return response()->json($result);*/

        $result = Enrolement::latest()->paginate();

        return view('enrolements.index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enrolements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Enrolement $enrolement)
    {

        if ($request->is('api/*'))
        {
            $validator = Validator::make($request->all(),[
                /*'ref' => 'unique:enrolements',
                'name' => 'required',
                'surname' => 'required',
                'phone' => 'required',
                'user_id' => 'required',*/
                'ref' => ['required', 'unique:enrolements'],
                'name' => ['required'],
                'surname' => ['required'],
                'phone' => ['required'],
                'user_id' => ['required']

            ]);

            //dd($request->all());

            if ($validator->fails())
            {
                return response()->json($validator->messages(), 400);
            }

            //dd('test');
        }
        else{
            //dd($request->all());

            $this->validate($request, [

                'ref' => ['required', 'unique:enrolements'],
                'name' => ['required'],
                'surname' => ['required'],
                'phone' => ['required'],
               /* 'user_id' => ['required'],*/
                ]);

        }

        //dd($request->all());
        $user = Auth::user();
        $enrolement->ref = $request->input('ref');
        $enrolement->name = $request->input('name');
        $enrolement->surname = $request->input('surname');

        if ($request->is('api/*'))
        {
            $enrolement->user_id = $request->input('user_id');
            $enrolement->phone = $request->input('phone');
        }else
        {
            $enrolement->user_id = $user->id;
            $enrolement->phone = $request->input('indicatif').$request->input('phone');
        }

        $enrolement->save();

        if ($request->is('api/*'))
        {
            return response()->json($enrolement,201);
        }
        else
        {
            return redirect()->route('enrolements.index')->with('success','Le client nommé '.$enrolement->name.' '.$enrolement->surname.' ' .'a été enrôlé avec succès');
        }


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
