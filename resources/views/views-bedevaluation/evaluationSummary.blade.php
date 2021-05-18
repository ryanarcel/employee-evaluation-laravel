@extends('layouts.master')
@section('title')
    {{$evaluation->evaluee->fname}} {{$evaluation->evaluee->lname}}
@stop
@section('styles')
<style>
    body {
        counter-reset: section;
    }

    .statement::before {
        counter-increment: section;
        content: counter(section) ". ";
    }
    .statement, .theTeacher{
        width:500px;
    }
    table tbody{
        font-family:Arial, Helvetica, sans-serif;
    }
    .bg-gray{
        background: #e8e9ea;
    }
    .bg-grayer{
        background: #d5d8d9;
    }
    .bg-moregrayer{
        background: #c5cacd;
    }
    .bg-grayest{
        background: #afb8bc;
    }
    .endColumn{
        border-right:0.3px solid #d4d4d4; 
    }
</style>
@stop
@section('content') 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <span class="h5">{{$evaluation->evaluee->fname}} {{$evaluation->evaluee->lname}}</span>
    <div class="float-right">
        @if($evaluation->status===1)
            <a href="{{route('openClose',['id'=>$evaluation->id, 'status'=>0, 'origin'=>'indiv'])}}" class="text-success mr-2" id="openClose"><i data-feather="toggle-left"></i> Open</a>
        @else
            <a href="{{route('openClose',['id'=>$evaluation->id, 'status'=>1, 'origin'=>'indiv'])}}" class="text-muted mr-2" id="openClose"><i data-feather="toggle-right"></i> Closed</a>
        @endif
        @if($evaluation->grant_access===0)
            <a href="{{route('accessNot',['id'=>$evaluation->id, 'access'=>1, 'origin'=>'indiv'])}}" class="mr-2 text-muted"><i data-feather="eye-off"></i> Hidden from teacher</a>
        @else
            <a href="{{route('accessNot',['id'=>$evaluation->id, 'access'=>0, 'origin'=>'indiv'])}}" class="mr-2 text-success"><i data-feather="eye"></i> Shown to teacher</a>
        @endif
        
        <a href="{{route('archival', $evaluation->id)}}" class="mr-2 text-danger" onclick="confirmArchival()"><i data-feather="archive"></i> Archive</a>
        <a href="{{route('print', $evaluation->id)}}" class=""><i data-feather="printer"></i> Print</a>
    </div>
</div>

{{-- <div class="float-left mb-5"> --}}
    <a href="{{route('bedevaluations.index')}}"><i data-feather="arrow-left"></i> Return</a>
{{-- </div> --}}

<div class="row mb-2">
    <div class="col mb-2 ml-4 mt-4">
        Name of Teacher: <b>{{$evaluation->evaluee->lname}}, {{$evaluation->evaluee->fname}}</b><br>
        Subject: <b>{{$evaluation->subject}}</b><br>
        Session: <b>{{$evaluation->session}}</b>
    </div>
    <div class="col mb-2 ml-5 mt-4">
        Date: <b>{{$evaluation->date}}</b><br>
        Course: <b>course</b><br>
        School Year: <b>{{$evaluation->SY_from}}-{{$evaluation->SY_to}}</b>
    </div>
</div>

    <div class="card mb-5 mt-2 shadow">
        <div class="card-body">
        <table class="table" style="border-bottom: 2px solid #ccc">
        <thead>
            <tr>
                <th class="theTeacher col-md-4 mr-5 bg-white endColumn">The teacher...</th>
                <th class="text-center bg-white">4</th>
                <th class=" bg-white"></th>
                <th class="text-center bg-white endColumn">%</th>
                <th class="text-center bg-white">3</th>
                <th class="bg-white"></th>
                <th class="text-center bg-white endColumn">%</th>
                <th class="text-center bg-white">2</th>
                <th class="bg-white"></th>
                <th class="text-center bg-white endColumn">%</th>
                <th class="text-center bg-white">1</th>
                <th class="bg-white"></th>
                <th class="text-center bg-white endColumn">%</th>
                <th class="text-center bg-white">Total</th>
                <th class="text-center bg-white">%</th>
                <th class="text-center bg-white">WM</th>
            </tr>
        </thead>
        <tbody>
        
        <form action="{{route('submit-totalscores')}}" method="post" id="theForm">
            @method('post')
            @csrf
            <input type="hidden" name="evaluation" value="{{$evaluation->id}}">
        @foreach($evaluation->tool->items as $item)
            @php
                $studTotal = count($evaluation->students)
            @endphp
            <tr> 
                <td class="col-md-4 statement mr-5 endColumn ">&nbsp;&nbsp;&nbsp;{{$item->statement}}</td>

                {{-- column 4 --}}
                <td class="text-center text-primary font-weight-bold bg-grayest">
                    @php
                        $count4 = 0;
                    @endphp
                    @foreach ($evaluation->students as $student)
                        @foreach ($student->scores as $score)
                            @if($item->id === $score->item_id && $score->score === 4)
                                @php
                                    $count4 ++
                                @endphp
                            @endif 
                        @endforeach
                        
                    @endforeach
                    {{$count4}}
                </td>
                <td class="text-center bg-grayest font-italic">
                    @php
                        $per4 = ($count4/$studTotal);
                        echo number_format($per4 * 4, 1)
                    @endphp
                </td>
                <td class="text-center bg-grayest endColumn font-weight-bold">
                    {{number_format($per4 * 100, 0)}}
                </td>


                {{-- column 3 --}}
                <td class="text-center text-primary font-weight-bold bg-moregrayer">
                    @php
                        $count3 = 0;
                    @endphp
                    @foreach ($evaluation->students as $student)
                        @foreach ($student->scores as $score)
                            @if($item->id === $score->item_id && $score->score === 3)
                                @php
                                    $count3 ++
                                @endphp
                            @endif 
                        @endforeach
                        
                    @endforeach
                    {{$count3}}
                </td>
                <td class="text-center bg-moregrayer font-italic">
                    @php
                        $per3 = ($count3/$studTotal);
                        echo number_format($per3 * 3, 1)
                    @endphp
                </td>
                <td class="text-center bg-moregrayer endColumn font-weight-bold">
                    {{number_format($per3 * 100, 0)}}
                </td>
                
                {{-- column 2 --}}
                <td class="text-center text-primary font-weight-bold bg-grayer">
                    @php
                        $count2 = 0;
                    @endphp
                    @foreach ($evaluation->students as $student)
                        @foreach ($student->scores as $score)
                            @if($item->id === $score->item_id && $score->score === 2)
                                @php
                                    $count2 ++
                                @endphp
                            @endif 
                        @endforeach
                        
                    @endforeach
                    {{$count2}}
                </td>
                <td class="text-center bg-grayer font-italic">
                    @php
                        $per2 = ($count2/$studTotal);
                        echo number_format($per2 * 2, 1)
                     @endphp
                </td>
                <td class="text-center bg-grayer endColumn font-weight-bold">
                        {{number_format($per2 * 100, 0)}}
                </td>


                {{-- column 1 --}}
                <td class="text-center text-primary font-weight-bold bg-gray">
                    @php
                        $count1 = 0;
                    @endphp
                    @foreach ($evaluation->students as $student)
                        @foreach ($student->scores as $score)
                            @if($item->id === $score->item_id && $score->score === 1)
                                @php
                                    $count1 ++
                                @endphp
                            @endif 
                        @endforeach
                        
                    @endforeach
                    {{$count1}}
                </td>
                <td class="text-center bg-gray font-italic">
                    @php
                        $per1 = ($count1/$studTotal);
                        echo number_format($per1 * 1, 1)
                    @endphp
                </td>
                <td class="text-center bg-gray endColumn font-weight-bold">
                    {{number_format($per1 * 100, 0)}}
                </td>

                {{-- totals --}}
                <td class="text-center font-weight-bold ">{{$studTotal}}</td>
                <td class="text-center font-italic">
                    @php
                        $totalper = number_format((($per4 * 100) + ($per3 * 100) + ($per2 * 100) + ($per1 * 100)), 0);
                        echo $totalper
                    @endphp
                </td>
                <td class="text-center text-primary font-weight-bold wm">
                    @php
                        $totalwm = number_format((($per4 * 4)  + ($per3 * 3) + ($per2 * 2) + ($per1 * 1) ), 0);
                        echo $totalwm
                    @endphp
                    <input type="hidden" name="{{$item->id}}" value="{{$totalwm}}">
                </td>
            </tr>
            
        @endforeach
    </form>
            <tr>
                <td colspan="1"><span class="float-right font-weight-bold mr-1">Total</span></td>
                <td colspan="15" class="sumwm"><span class="float-right mr-1 font-italic font-weight-bold text-primary"></span></td>
            </tr>
        </tbody>
        </table>
        <div class="comment-div mt-3 pt-3" style="">
            <h6>Comments</h6>
            <ul>
            @foreach ($evaluation->students as $student)
                @if($student->comment->comment != "")
                    <li>{{$student->comment->comment}}</li>
                @endif
            @endforeach
            </ul>
        </div>
        </div>

    </div>

@stop
@section('scripts')
<script>
$(document).ready(function(event){

    var sumwm = 0;
    $('.wm').each(function(i, obj) {
        sumwm += parseInt($(this).html());
    });

    $('.sumwm span').html(sumwm);
     console.log(sumwm)
    

})

function confirmArchival(){
    var result = confirm("You are about to archive this evaluation.\n Confirm archival.");
    if (result != true) {
        event.preventDefault();
        returnToPreviousPage();
        return false;
    }
    return true;
}   
</script>
@stop