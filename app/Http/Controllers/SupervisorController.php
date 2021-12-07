<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluee;
use App\Evaluation;
use App\ToolItem;


class SupervisorController extends Controller
{
 
    public function index()
    {   
        $supervisors = Evaluee::orderBy('id','desc')->where('rank','Supervisor')->get();
        return view('views-supervisor.evaluees')->with(["supervisors"=> $supervisors]);
    }

    public function create()
    {
        return view('views-supervisor.createEvaluee');
    }


    public function store(Request $request)
    {
        $evaluee = new Evaluee;
        $evaluee->fname = $request->fname;
        $evaluee->lname = $request->lname;
        $evaluee->office = $request->office;
        $evaluee->position = $request->position;
        $evaluee->rank = "Supervisor";
        $evaluee->teaching_dept = "N/A";

        /*$duplicateEval = Evaluee::where([
                    ['fname','=', $request->fname],
                    ['lname','=', $request->lname],
                    ['rank', '=', 'Supervisor']
            ])->get();

        //if evaluee does not exists yet
        if($duplicateEval->count()===0){*/
           
            $evaluee->save();            
            
            return redirect()->route('supervisors.index')->with("message","Record Added");
           
        /*}

        else{
            return redirect()->route('supervisors.index')->withErrors("A supervisor with the same name already exists.");
        }*/
    }

    public function show($id)
    {
        $evaluee = Evaluee::find($id);
        $evaluations = $evaluee->evaluations;

        if(count($evaluations)==0){
            return view("views-supervisor.eachEvaluee", compact("evaluee"))->withErrors(["No evaluations found"]);
        }
        else{
            return view("views-supervisor.eachEvaluee")->with(["evaluee" => $evaluee, "evaluations" => $evaluations]);
        }
    }

    public function edit($id)
    {
        $evaluee = Evaluee::find($id);
        return view("views-supervisor.editEvaluee")->with("evaluee", $evaluee);
    }

    public function update(Request $request, $id)
    {
        $evaluee = Evaluee::find($id);
        $evaluee->fname = $request->fname;
        $evaluee->lname = $request->lname;
        $evaluee->office = $request->office;
        $evaluee->position = $request->position;
        $evaluee->rank = "Supervisor";
        $evaluee->teaching_dept = "N/A";

        $evaluee->save();
        return redirect()->route('supervisors.index');
    }

 
    public function destroy($id)
    {
        echo $id;
       $evaluee = Evaluee::find($id);
       
       Evaluation::where('evaluee_id', $id)->delete();
       $evaluee->delete();
       
       return redirect()->route('supervisors.index');
    }
}