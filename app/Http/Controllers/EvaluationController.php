<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluee;
use App\Evaluation;

class EvaluationController extends Controller
{
    public function index()
    { 
        
        $evaluations = Evaluation::where('tool_id','=', 1)->where('archived', 0)->orderBy('id', 'desc')->get();
 
        //return $evaluations;
        return view('views-evaluation.teacherEvaluation', compact("evaluations"));
    
    }

    public function create()
    {
        $evaluees = Evaluee::where('rank','=','Faculty')->get();
        return view('views-evaluation.teacher-create', compact("evaluees"));
    }

    public function store(Request $request)
    {
        $evaluation = new Evaluation;
        $evaluation->tool_id = $request->tool_id;
        $evaluation->evaluee_id = $request->evaluee_id;
        $evaluation->subject = $request->subject;
        $evaluation->session = $request->session;
        $evaluation->date = $request->date;
        $evaluation->course = $request->course;
        $evaluation->yrlevel = $request->yrlevel;
        $evaluation->SY_from = $request->SYfrom;
        $evaluation->SY_to = $request->SYto;
        $evaluation->semester = $request->semester;
        $evaluation->term = $request->term;
        $evaluation->status = 0;

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $key = substr(str_shuffle($permitted_chars), 0, 6);

        $evaluation->access_key = $key;

        $evaluation->save();
        return redirect()->route('evaluations.index',['status'=>'success']);
    }

  
    public function show($id)
    {
        $evaluation = Evaluation::find($id);
        if($evaluation->scores->count()===0){
            return view("views-evaluation.notFound");
        }
        else{
            return view("views-evaluation.eachEvaluation", compact("evaluation"));
        }
    }
 
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $evaluee = Evaluee::find($id);
        $evaluee->fname = $request->fname;
        $evaluee->lname = $request->lname;
        $evaluee->office = $request->office;
        $evaluee->position = $request->position;
        $evaluee->rank = "Administrator";
        $evaluee->username = "";
        $evaluee->password = "";
        $evaluee->save();
        return redirect()->route('admins.index');
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
            return redirect()->route('evaluations.show', $id);
        elseif($request->origin == "list")
            return redirect()->route('evaluations.index');
    }

    public function accessNot($id, Request $request){
        $evaluation = Evaluation::find($id);
        $evaluation->grant_access = $request->access;
        $evaluation->save();
        if($request->origin == "indiv")
           return redirect()->route('evaluations.show', $id);
        elseif($request->origin == "list")
           return redirect()->route('evaluations.index');
      //  echo $request->access;
    }
   
    public function archival($id, Request $request){
        $evaluation = Evaluation::find($id);
        $evaluation->archived = 1;
        $evaluation->status = 0;
        $evaluation->grant_access = 0;
        $evaluation->save();
        
        if($evaluation->tool_id == 1){
            return redirect()->route('evaluations.index');
        }
        else if($evaluation->tool_id == 2){
            return redirect()->route('adminevaluations.index');
        }
        else if($evaluation->tool_id == 3){
            return redirect()->route('supervevaluations.index');
        }
        
    }

    public function print($id){
        $evaluation = Evaluation::find($id);
        return view("views-evaluation.printEvaluation", compact("evaluation"));
    }

}
