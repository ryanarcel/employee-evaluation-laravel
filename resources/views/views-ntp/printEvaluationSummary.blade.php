<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Print Evaluation</title>
    <link rel="icon" href="{{asset('image/acdseal.png')}}" type="image/x-icon">
    <style>
        html{
            
            font-family:Arial, Helvetica, sans-serif;
        }
        body{
            counter-reset: section;
            padding-bottom: 30px;
        }
        .statement::before {
        counter-increment: section;
        content: counter(section) ". ";
    }
        .numbering::after {
            counter-increment: section;
            content: counter(section) ". ";
        }
        .table tr td{
            border: 0.5px solid #000;
            width: 20px;
            height: 20px;
           
        }
        .table thead tr th{
            border: 0.3px solid #000;
            /* font-size: 0.8em; */
            
        }
        .container{
            padding-left: 50px;
            padding-right: 50px;
        }
        .theTeacher, .statement{
            width: 500px;
            font-size: 1em;
        }
        .totalwm{
            width: 40px;
            height: 40px;
            /* border: 1px solid #000; */
        }
        .endColumn{
            border-right: 1px #acacac solid;
        }
        
    </style>
</head>
<body>
    <div class="container">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('image/ACDheader.jpg')}}" class="mt-5 mb-5">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="font-italic">Evaluation for College Faculty School Year {{$evaluations[0]->SY_from}}-{{$evaluations[0]->SY_to}}, Semester {{$evaluations[0]->semester}} Term {{$evaluations[0]->term}}</p>
                    <p>Name of Teacher: <b>{{$evaluee->lname}}, {{$evaluee->fname}}</b> <span class="float-right">Date: <b>@php echo date('F d, Y', strtotime("now")); @endphp</b></span></p>

                </div>
            </div>
            <center><h5>SUMMARY OF EVALUATION</h5></center>
        <table class="table">
        <thead>
           
            <tr>
             
                <th class="theTeacher bg-white endColumn">The teacher...</th>
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
            
            <td class="statement mr-5 endColumn ">&nbsp;&nbsp;&nbsp;{{$item->statement}}</td>
            @foreach($evaluations as $evaluation)
                
                <td class="text-center wm endColumn score-{{$item->id}} scoreCol-{{$evaluation->id}}">
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
                <td class="mr-5 text-center endColumn font-weight-bold sumPerRow rowTotal-{{$item->id}}"></td>
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
  
        <div class="row mt-5 mb-5">
            <div class="col">
                Prepared by:<br><br>
                <b><input type="text" value="Enter Name" style="border: 0px; font-weight: bold"></b><br>
                HRDO Staff
            </div>
            <div class="col ml-5">
                Noted by:<br><br>
                <b><input type="text" value="Enter Name" style="border: 0px; font-weight: bold"></b><br>
                HRDO Head
            </div>
            <div class="col ml-5">
                <b>Legend:</b><br>
                3.6 - 4.0 - Very Good<br>
                2.6 - 3.5 - Satisfactory<br>
                1.6 - 2.5 - Fair<br>
                1.0 - 1.5 - Poor
            </div>
        </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
   
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
    
</body>
</html>