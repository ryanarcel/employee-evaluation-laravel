<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluee;

class EvalueeController extends Controller
{

    public function index()
    {
        $evaluees = Evaluee::all();
        return view("views-evaluee.evaluee")->with("evaluees", $evaluees);
    }

 
    public function create()
    {
        return view('views-evaluee.createEvaluee');
    }


    public function store(Request $request)
    {
        $evaluee = new Evaluee;
        $evaluee->fname = $request->fname;
        $evaluee->lname = $request->lname;
        $evaluee->office = $request->office;
        $evaluee->position = $request->position;

        $evaluee->save();
        return redirect()->route('evaluees.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $evaluee = Evaluee::find($id);
        return view("views-evaluee.editEvaluee")->with("evaluee", $evaluee);
    }

    public function update(Request $request, $id)
    {
        $evaluee = Evaluee::find($id);
        $evaluee->fname = $request->fname;
        $evaluee->lname = $request->lname;
        $evaluee->office = $request->office;
        $evaluee->position = $request->position;

        $evaluee->save();
        return redirect()->route('evaluees.index');
    }

 
    public function destroy($id)
    {
        //
    }
}
