<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluee;
use App\Evaluation;

class SupervEvaluationController extends Controller
{
    public function index()
    { 
        
        $evaluations = Evaluation::where('tool_id','=', 3)->where('archived', 0)->orderBy('id', 'desc')->get();

        //return $evaluations;
        return view('views-supervEval.supervEvaluation', compact("evaluations"));
    
    }

    public function create()
    {
        $evaluees = Evaluee::where('rank','Supervisor')->get();
        return view('views-supervEval.superv-create', compact("evaluees"));
    }

    public function store(Request $request)
    {
        $evaluation = new Evaluation;
        $evaluation->tool_id = $request->tool_id;
        $evaluation->evaluee_id = $request->evaluee_id;
        $evaluation->subject = "N/A";
        $evaluation->session = "N/A";
        $evaluation->date = $request->date;
        $evaluation->course = "N/A";
        $evaluation->yrlevel = 0000;
        $evaluation->SY_from = $request->SYfrom;
        $evaluation->SY_to = $request->SYto;
        $evaluation->semester = 0;
        $evaluation->term = 0;
        $evaluation->status = 0;

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $key = substr(str_shuffle($permitted_chars), 0, 6);

        $evaluation->access_key = $key;

        $evaluation->save();
        return redirect()->route('supervevaluations.index',['status'=>'success']);
    }

    public function show($id)
    {
        $evaluation = Evaluation::find($id);
        if($evaluation->scores->count()===0){
            return view("views-supervEval.notFound");
        }
        else{
            return view("views-supervEval.eachEvaluation", compact("evaluation"));
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function openClose($id, Request $request){
       
        $evaluation = Evaluation::find($id);
        $evaluation->status = $request->status;
        $evaluation->save();
        if($request->origin == "indiv")
            return redirect()->route('supervevaluations.show', $id);
        elseif($request->origin == "list")
            return redirect()->route('supervevaluations.index');
    }

    public function accessNot($id, Request $request){
        $evaluation = Evaluation::find($id);
        $evaluation->grant_access = $request->access;
        $evaluation->save();
        if($request->origin == "indiv")
           return redirect()->route('supervevaluations.show', $id);
        elseif($request->origin == "list")
           return redirect()->route('supervevaluations.index');
      //  echo $request->access;
    }
   
    public function archival($id, Request $request){
        $evaluation = Evaluation::find($id);
        $evaluation->archived = 1;
        $evaluation->status = 0;
        $evaluation->grant_access = 0;
        $evaluation->save();

        return redirect()->route('supervevaluations.index');
      
    }

    public function print($id){
        $evaluation = Evaluation::find($id);
        return view("views-supervEval.printEvaluation", compact("evaluation"));
    }

}
