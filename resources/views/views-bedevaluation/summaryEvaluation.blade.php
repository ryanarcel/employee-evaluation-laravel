@extends('layouts.master')
@section('title')
    Evaluation Summary
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
    <h5>{{$evaluee->lname}}, {{$evaluee->fname}}</h5>
    
    <a href="{{route('bedPrintSummary', $evaluee->id)}}" class=""><i data-feather="printer"></i> Print</a>
</div>

    <div class="card mb-5 mt-2 shadow">
        <div class="card-body">
        <center><h5>SUMMARY OF EVALUATION</h5></center>
        <table class="table" style="border-bottom: 2px solid #ccc" >
        <thead>
           
            <tr>
                <th class="theTeacher col-md-4 mr-5 bg-white endColumn">The teacher...</th>
                @foreach($evaluations as $evaluation)
                    <th class="text-center mr-5 bg-white endColumn"><b>{{$evaluation->course}} {{$evaluation->yrlevel}} ({{$evaluation->session}})</b></th>
                @endforeach
                <th class="text-center mr-5 bg-white endColumn"><b>Total</b></th>
            </tr>
            
        </thead>
        <tbody>
    @php
        $countItems = count($items); 
        
    @endphp
    
    @foreach($items as $item)
        <tr> 
        
            @php
                $studTotal = count($evaluation->students)
            @endphp
            
            <td class="col-md-4 statement mr-5 endColumn ">&nbsp;&nbsp;&nbsp;{{$item->statement}}</td>
            @foreach($evaluations as $evaluation)
                <td class="text-center text-primary font-weight-bold wm endColumn score-{{$item->id}} scoreCol-{{$evaluation->id}}">
                    {{-- $per4 --}}
                    
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
                    
                        @php
                            $per4 = ($count4/$studTotal);
                        @endphp

                    {{-- $per3 --}}
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
                    
                        @php
                            $per3 = ($count3/$studTotal);
                        @endphp
                
                    {{-- $per2 --}}
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
                
                        @php
                            $per2 = ($count2/$studTotal);
                        @endphp
            
                    {{-- column 1 --}}
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
            
                        @php
                            $per1 = ($count1/$studTotal);       
                        @endphp
        
                    {{-- totals --}}            
                        @php
                            $totalwm = number_format((($per4 * 4)  + ($per3 * 3) + ($per2 * 2) + ($per1 * 1) ), 1);
                            echo $totalwm
                        @endphp
                        
                    </td>
            @endforeach
                <td class="mr-5 text-center endColumn font-weight-bold  sumPerRow rowTotal-{{$item->id}}"></td>
        </tr>
     @endforeach
            <tr>
                <td colspan="1" class=" endColumn"><span class="float-right font-weight-bold mr-1">Total</span></td>
                @foreach($evaluations as $evaluation)
                    <td class="mr-5 text-center endColumn font-weight-bold colTotal-{{$evaluation->id}} colSums">{{$evaluation->id}}</td>
                @endforeach
                <td class="endColumn overallSum text-center font-weight-bold"><span></span></td>
            </tr>
        </tbody>
        </table>
     
        </div>

    </div>

@stop
@section('scripts')
<script>
$(document).ready(function(event){    

    var totalItems = {{$countItems}}
    console.log(totalItems);

    var countItems = 0;
    
    @foreach($maxItemId as $max)
            countItems = {{$max->id}};
    @endforeach

   // console.log("countItems: "+countItems);
    for(var i=1; i<=countItems;i++){
        var sumRow = 0;
        $(".score-"+i).each(function(i, obj) {
            sumRow += parseFloat($(this).html());
        });
        var len = $(".score-"+i).length;
        sumRow = sumRow / len;
        
        $(".rowTotal-"+i).html(sumRow.toFixed(1));
       
    }
    
    //=========================================
    var countEval = 0;

    @foreach($maxEvalId as $maxEval)
            countEval = {{$maxEval->id}};
    @endforeach
    
    for(var i=1; i<=countEval;i++){
        var sumCol = 0;
        $(".scoreCol-"+i).each(function(i, obj) {
            sumCol += parseFloat($(this).html());
            
        });
        sumCol = sumCol / totalItems;
        $(".colTotal-"+i).html(sumCol.toFixed(1));
      
    }

    //=======================================
    
    var overallSum = 0;
    $('.sumPerRow').each(function(i, obj) {
        console.log(parseFloat($(this).html()));
        overallSum += parseFloat($(this).html()); 
    });


   // console.log($('.colSums').html());
    var rowSumsTotal = $('.sumPerRow').length;
    overallSum = overallSum / rowSumsTotal;
    $('.overallSum').html(overallSum.toFixed(1));

    //===========================================

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