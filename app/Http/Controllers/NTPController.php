<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluee;
use App\Evaluation;
use App\ToolItem;

class NTPController extends Controller
{
    public function index(Request $request)
    {
        
        $evaluees = Evaluee::orderBy('id','desc')->where('rank','NTP')->get();
       
        return view("views-ntp.evaluee")->with(["evaluees"=> $evaluees]);
    }

 
    public function create()
    {
        return view('views-ntp.createEvaluee');
    }

    public function store(Request $request)
    {
        $evaluee = new Evaluee;
        $evaluee->fname = $request->fname;
        $evaluee->lname = $request->lname;
        $evaluee->office = $request->office;
        $evaluee->position = $request->position;
        $evaluee->rank = "NTP";
        $evaluee->teaching_dept = "N/A";

      /*  $duplicateEval = Evaluee::where([
                    ['fname','=', $request->fname],
                    ['lname','=', $request->lname],
                    ['teaching_dept','=','BED']
            ])->get();

        //if evaluee does not exists yet
        if($duplicateEval->count()===0){*/
            $evaluee->save();            
            return redirect()->route('NTPevaluees.index')->with("message","Record Added");
        /*}
        else{
            return redirect()->route('NTPevaluees.index')->withErrors("A personnel with the same name already exists in the database.");
        }*/
    }

    public function show($id)
    {
        $evaluee = Evaluee::find($id);
        $evaluations = $evaluee->evaluations;

        if(count($evaluations)==0){
            return view("views-ntp.eachEvaluee", compact("evaluee"))->withErrors(["No evaluations found"]);
        }
        else{
            return view("views-ntp.eachEvaluee")->with(["evaluee" => $evaluee, "evaluations" => $evaluations]);
        }
    }

    public function edit($id)
    {
        $evaluee = Evaluee::find($id);
        return view("views-ntp.editEvaluee")->with("evaluee", $evaluee);
    }

    public function update(Request $request, $id)
    {
        $evaluee = Evaluee::find($id);
        $evaluee->fname = $request->fname;
        $evaluee->lname = $request->lname;
        $evaluee->office = $request->office;
        $evaluee->position = $request->position;
        $evaluee->rank = "NTP";
        $evaluee->teaching_dept = "N/A";

        $evaluee->save();
        return redirect()->route('NTPevaluees.index');
    }

 
    public function destroy($id)
    {
        echo $id;
       $evaluee = Evaluee::find($id);
       
       Evaluation::where('evaluee_id', $id)->delete();
       $evaluee->delete();
       
       return redirect()->route('NTPevaluees.index');
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
