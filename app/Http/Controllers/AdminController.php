<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluee;
use App\Evaluation;
use App\ToolItem;


class AdminController extends Controller
{
 
    public function index()
    {   
        $admins = Evaluee::orderBy('id','desc')->where('rank','Administrator')->get();
        return view('views-admin.evaluees')->with(["admins"=> $admins]);
    }

    public function create()
    {
        return view('views-admin.createEvaluee');
    }


    public function store(Request $request)
    {
        $evaluee = new Evaluee;
        $evaluee->fname = $request->fname;
        $evaluee->lname = $request->lname;
        $evaluee->office = $request->office;
        $evaluee->position = $request->position;
        $evaluee->rank = "Administrator";
        $evaluee->teaching_dept = "N/A";

        /*$duplicateEval = Evaluee::where([
                    ['fname','=', $request->fname],
                    ['lname','=', $request->lname],
                    ['rank', '=', 'Administrator']
            ])->get();

        //if evaluee does not exists yet
        if($duplicateEval->count()===0){*/
           
            $evaluee->save();            
            
            return redirect()->route('admins.index')->with("message","Record Added");
           
       /* }

        else{
            return redirect()->route('admins.index')->withErrors("An administrator with the same name already exists in the database.");
        }*/
    }

    public function show($id)
    {
        $evaluee = Evaluee::find($id);
        $evaluations = $evaluee->evaluations;

        if(count($evaluations)==0){
            return view("views-admin.eachEvaluee", compact("evaluee"))->withErrors(["No evaluations found"]);
        }
        else{
            return view("views-admin.eachEvaluee")->with(["evaluee" => $evaluee, "evaluations" => $evaluations]);
        }
    }

    public function edit($id)
    {
        $evaluee = Evaluee::find($id);
        return view("views-admin.editEvaluee")->with("evaluee", $evaluee);
    }

    public function update(Request $request, $id)
    {
        $evaluee = Evaluee::find($id);
        $evaluee->fname = $request->fname;
        $evaluee->lname = $request->lname;
        $evaluee->office = $request->office;
        $evaluee->position = $request->position;
        $evaluee->rank = "Administrator";
        $evaluee->teaching_dept = "N/A";

        $evaluee->save();
        return redirect()->route('admins.index');
    }

 
    public function destroy($id)
    {
        echo $id;
       $evaluee = Evaluee::find($id);
       
       Evaluation::where('evaluee_id', $id)->delete();
       $evaluee->delete();
       
       return redirect()->route('admins.index');
    }
}