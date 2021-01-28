<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparatie;

class ReparatieController extends Controller
{
    // Dit voert de index oproep uit
    public function index()
    {
        $reparaties =  Reparatie::OrderBy('id','asc')->get();
        return view('reparatie.index')->with('reparaties', $reparaties);
    }

    // Dit voert de serverside datatable creatie uit
    public function create()
    {
        return view('reparatie.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'titel'=> 'required',
            'datum'=> 'required',
            'tijdstip'=> 'required',
            'kosten'=> 'required',
        ]);
            $reparaties = new Reparatie();
            $reparaties->titel = $request->input('titel');
            $reparaties->datum = $request->input('datum');
            $reparaties->tijdstip = $request->input('tijdstip');
            $reparaties->kosten = $request->input('kosten');
            // $reparatie->status = 'In Progress';
            // $reparatie->opmerkingen = $request->input('opmerkingen');
            $reparaties->user_id = auth()->user()->id;
            $reparaties->save();

            return redirect('/home')->with('success', 'Reparatie Ingepland');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'titel'=> 'required',
            'datum'=> 'required',
            'tijdstip'=> 'required',
            'kosten'=> 'required',
        ]);
            $reparaties = new Reparatie($id);
            $reparaties->titel = $request->input('titel');
            $reparaties->datum = $request->input('datum');
            $reparaties->tijdstip = $request->input('tijdstip');
            $reparaties->kosten = $request->input('kosten');
            // $reparatie->status = 'In Progress';
            // $reparatie->opmerkingen = $request->input('opmerkingen');
            $reparaties->user_id = auth()->user()->id;
            $reparaties->save();

            return redirect('/home')->with('Success', 'Reparatie Upgedatet');
    }

    public function destroy($id)
    {
        $reparaties = Reparatie::find($id);
        $reparaties->delete();

        return redirect('/home')->with('ATTENTIE', 'Reparatie Geannuleerd');
    }
}
