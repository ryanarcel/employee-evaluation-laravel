<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Evaluee;
use App\Evaluation;
use App\ToolItem;

class EvalueeController extends Controller
{

    public function index(Request $request)
    {
        
        $evaluees = Evaluee::orderBy('id','desc')->where('rank','Faculty')->where('teaching_dept','College')->get();
       
        return view("views-evaluee.evaluee")->with(["evaluees"=> $evaluees]);
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
        $evaluee->office = "College";
        $evaluee->position = "Teacher";
        $evaluee->rank = "Faculty";
        $evaluee->teaching_dept = "College";

        /*$duplicateEval = Evaluee::where([
                    ['fname','=', $request->fname],
                    ['lname','=', $request->lname],
                    ['teaching_dept', '=', 'College']
            ])->get();

        //if evaluee does not exists yet
        if($duplicateEval->count()===0){*/
           
            $evaluee->save();            
            
            return redirect()->route('evaluees.index')->with("message","Record Added");
           
        /*}

        else{
            return redirect()->route('evaluees.index')->withErrors("A college teacher with the same name already exists in the database.");
        }*/
    }

    public function show($id)
    {
        $evaluee = Evaluee::find($id);
        $evaluations = $evaluee->evaluations;

        if(count($evaluations)==0){
            return view("views-evaluee.eachEvaluee", compact("evaluee"))->withErrors(["No evaluations found"]);
        }
        else{
            return view("views-evaluee.eachEvaluee")->with(["evaluee" => $evaluee, "evaluations" => $evaluations]);
        }
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
        $evaluee->office = "College";
        $evaluee->position = "Teacher";
        $evaluee->rank = "Faculty";
        $evaluee->teaching_dept = "College";

        $evaluee->save();
        return redirect()->route('evaluees.index');
    }

 
    public function destroy($id)
    {
        echo $id;
       $evaluee = Evaluee::find($id);
       
       Evaluation::where('evaluee_id', $id)->delete();
       $evaluee->delete();
       
       return redirect()->route('evaluees.index');
    }

    public function summarize(Request $request, $id){
        
        $request->session()->forget('toSummarize');
        $request->session()->put('toSummarize', $request->evaluations);

            $maxItemId = ToolItem::whereRaw('id = (select max(`id`) from tool_items)')->get();
            $maxEvalId = Evaluation::whereRaw('id = (select max(`id`) from evaluations)')->get();
            $evaluations = Evaluation::find($request->evaluations);
            $evaluee = Evaluee::find($id);
            $items = ToolItem::where("tool_id","=",1)->get();
            return view("views-evaluation.summaryEvaluation")->
            with(["evaluations"=> $evaluations,"items"=>$items,"maxItemId"=>$maxItemId, "maxEvalId"=>$maxEvalId, "evaluee"=>$evaluee]);
        
       return $evaluations;
        //return $request->session()->get("toSummarize");
    }

    public function printSummary(Request $request, $id){

        $evalArray = $request->session()->get("toSummarize");

        $maxItemId = ToolItem::whereRaw('id = (select max(`id`) from tool_items)')->get();
        $maxEvalId = Evaluation::whereRaw('id = (select max(`id`) from evaluations)')->get();
        $evaluations = Evaluation::find($evalArray);
        $evaluee = Evaluee::find($id);
        $items = ToolItem::where("tool_id","=",1)->get();
        return view("views-evaluation.printEvaluationSummary")->
        with(["evaluations"=> $evaluations,"items"=>$items,"maxItemId"=>$maxItemId, "maxEvalId"=>$maxEvalId, "evaluee"=>$evaluee]);
         
        //return dd($evaluations);
        //return $evalArray;
        //return $evaluations;
    }

}
