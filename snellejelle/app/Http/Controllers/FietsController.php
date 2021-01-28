<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fiets;

class FietsController extends Controller
{
    // Dit voert de index oproep uit
    public function index()
    {
        $fiets =  Fiets::OrderBy('id','asc')->get();
        return view('fiets.index')->with('fiets', $fiets);
    }

    // Dit voert de serverside datatable creatie uit
    public function create()
    {
        return view('fiets.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'merk'=> 'required',
            'model'=> 'required',
            'type'=> 'required',
            'kleur'=> 'required',
            'electrisch'=> 'required',
        ]);
            $fiets = new Fiets();
            $fiets->merk = $request->input('merk');
            $fiets->model = $request->input('model');
            $fiets->type = $request->input('type');
            $fiets->kleur = $request->input('kleur');
            $fiets->kleur = $request->input('electrisch');
            // $reparatie->status = 'In Progress';
            // $reparatie->opmerkingen = $request->input('opmerkingen');
            $fiets->user_id = auth()->user()->id;
            $fiets->save();

            return redirect('/home')->with('success', 'Fiets Toegevoegd');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'merk'=> 'required',
            'model'=> 'required',
            'type'=> 'required',
            'kleur'=> 'required',
        ]);
            $fiets = new Fiets($id);
            $fiets->merk = $request->input('merk');
            $fiets->model = $request->input('model');
            $fiets->type = $request->input('type');
            $fiets->kleur = $request->input('kleur');
            $fiets->kleur = $request->input('electrisch');
            // $reparatie->status = 'In Progress';
            // $reparatie->opmerkingen = $request->input('opmerkingen');
            $fiets->user_id = auth()->user()->id;
            $fiets->save();

            return redirect('/home')->with('Success', 'Fiets Upgedatet');
    }

    public function destroy($id)
    {
        $fiets = Fiets::find($id);
        $fiets->delete();

        return redirect('/home')->with('ATTENTIE', 'Fiets verwijderd');
    }
}
