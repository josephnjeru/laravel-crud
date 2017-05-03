<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Nerd;

class NerdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nerds = Nerd::all();
        //load view with all nerds
        return view('nerds.index')
                ->with('nerds', $nerds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nerds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store the nerd
        //set validation rules
        $rules=array(
            'name'=>'required',
            'email'=>'required|email',
            'nerd_level'=>'required|numeric'
            );
        $validator=Validator::make(Input::all(), $rules);

        //check if valdation is passed
        if ($validator->fails()) {
            return Redirect::to('nerds/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
        }else{
            //store
            $nerd = new Nerd();
            $nerd->name = Input::get('name');
            $nerd->email = Input::get('email');
            $nerd->password = Input::get('nerd_level');
            $nerd->save();

            //redirect
            Session::flash('message', 'nerd created successifully!');
            return Redirect::to('nerds');

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
        //Find a nerd using id
        $nerd = Nerd::find($id);

        //load the view with the nerd data
        return view('nerds.show')
            ->with('nerd', $nerd);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get the data to edit
        $nerd = Nerd::find($id);

        //load view with data to edit
        return view('nerds.edit')
              ->with('nerd', $nerd);
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
        //update data 
      //validator rules
      $rules = array(
        'name'=>'required',
        'email'=>'required|email',
        'nerd_level'=>'required|numeric'
        );

    //check if data is valid
      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
        return Redirect::to('nerds/'.$id. '/edit')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      }else{
        $nerd=Nerd::find($id);
        $nerd->name = Input::get('name');
        $nerd->email = Input::get('email');
        $nerd->password = Input::get('nerd_level');

        //save
        $nerd->save();

        //redirect to home and show success message
        Session::flash('message', 'details updated for '.$nerd->name);

        return Redirect::to('nerds/');

      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete
      $nerd = Nerd::find($id);
      $nerd->delete();

      //redirect
      Session::flash('message', 'Successifully deleted nerd');
      return Redirect::to('nerds');
    }
}
