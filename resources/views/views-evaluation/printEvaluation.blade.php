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
        .numbering::after {
            counter-increment: section;
            content: counter(section) ". ";
        }
        .tabled tr td{
            border: 0.5px solid #000;
            width: 30px;
            height: 40px;
           
        }
        .tabled thead tr th{
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
        
    </style>
</head>
<body>
    <div class="container">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('image/ACDheader.jpg')}}" class="mt-5 mb-5">
                </div>
            </div>
        @php 
            $tool = $_GET['tool'];
            if($tool == 1){
            
            $intro = "The teacher...";
        @endphp
            <div class="d-flex mb-3 ml-3">
                @if($evaluation->semester === 1)
                    <p class="font-italic">Evaluation for College Faculty School Year {{$evaluation->SY_from}} to {{$evaluation->SY_to}} 1st Semester {{$evaluation->term}} Term.</p>
                @else
                    <p class="font-italic">Evaluation for College Faculty School Year {{$evaluation->SY_from}} to {{$evaluation->SY_to}} 2nd Semester {{$evaluation->term}} Term.</p>
                @endif
            </div>

            <div class="row mb-2">
                <div class="col mb-2 ml-4">
                    Name of Teacher: <b>{{$evaluation->evaluee->lname}}, {{$evaluation->evaluee->fname}}</b><br>
                    Subject: <b>{{$evaluation->subject}}</b><br>
                    Session: <b>{{$evaluation->session}}</b>
                </div>
                <div class="col mb-2 ml-5">
                    Date: <b>{{$evaluation->date}}</b><br>
                    Course: <b>course</b><br>
                    School Year: <b>{{$evaluation->SY_from}}-{{$evaluation->SY_to}}</b>
                </div>
            </div>           
        @php 
            }
        @endphp

        @php 
            if($tool == 2){
                $intro = "The administrator...";
        @endphp
            <div class="d-flex mb-3 ml-3">
                <p class="font-italic">Evaluation for Admininstrators</p>
            </div>

            <div class="col mb-2 ml-4">
                Name of Director: <b>{{$evaluation->evaluee->lname}}, {{$evaluation->evaluee->fname}}</b><br>
                Office/Unit: <b>{{$evaluation->evaluee->office}}, {{$evaluation->evaluee->position}}</b><br>
            </div>
        @php 
            }
        @endphp

        @php 
            if($tool == 3){
                $intro = "The supervisor...";
        @endphp
            <div class="d-flex mb-3 ml-3">
                <p class="font-italic">Evaluation for Supervisors (Academic and Non-Academic)</p>
            </div>

            <div class="col mb-2 ml-4">
                Name of Personnel: <b>{{$evaluation->evaluee->lname}}, {{$evaluation->evaluee->fname}}</b><br>
                Unit/Office: <b>{{$evaluation->evaluee->office}}</b><br>
            </div>
        @php 
            }
        @endphp
            <table class="tabled col-md-12 mt-2">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="theTeacher mr-5"> &nbsp;{{$intro}}</th>
                            <th class="text-center">4</th>
                            <th class=""></th>
                            <th class="text-center">%</th>
                            <th class="text-center">3</th>
                            <th class=""></th>
                            <th class="text-center">%</th>
                            <th class="text-center">2</th>
                            <th class=""></th>
                            <th class="text-center">%</th>
                            <th class="text-center">1</th>
                            <th class=""></th>
                            <th class="text-center">%</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">%</th>
                            <th class="text-center">WM</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php   $countItem = count($evaluation->tool->items); @endphp
                    @foreach($evaluation->tool->items as $item)
                        @php
                            $studTotal = count($evaluation->students)
                        @endphp
                        <tr> 
                            <td class="numbering pl-2 text-center"></td>
                            <td class="statement mr-5 pl-3 ">{{$item->statement}}</td>
            
                            {{-- column 4 --}}
                            <td class="text-center  font-weight-bold bg-grayest">
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
                            <td class="text-center bg-grayest  font-weight-bold">
                                {{number_format($per4 * 100, 0)}}
                            </td>
            
            
                            {{-- column 3 --}}
                            <td class="text-center  font-weight-bold bg-moregrayer">
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
                            <td class="text-center bg-moregrayer  font-weight-bold">
                                {{number_format($per3 * 100, 0)}}
                            </td>
            
            
                            {{-- column 2 --}}
                            <td class="text-center  font-weight-bold bg-grayer">
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
                            <td class="text-center bg-grayer  font-weight-bold">
                                    {{number_format($per2 * 100, 0)}}
                            </td>
            
                            {{-- column 1 --}}
                            <td class="text-center  font-weight-bold bg-gray">
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
                            <td class="text-center bg-gray  font-weight-bold">
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
                            <td class="text-center  font-weight-bold wm">
                                @php
                                    $totalwm = number_format((($per4 * 4)  + ($per3 * 3) + ($per2 * 2) + ($per1 * 1) ), 1);
                                    echo $totalwm;
                                @endphp
                            
                              
                            </td>
                        </tr>
                        
                    @endforeach
                        <tr>
                            <td colspan="2"><span class="float-right font-weight-bold mr-1">Total</span></td>
                            <td colspan="15" class="sumwm"><span class="float-right mr-1 font-italic font-weight-bold"></span></td>
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
    $(document).ready(function(){

    //     var sumwm = 0;

    //     $('.wm').each(function(i, obj) {
    //         sumwm += parseInt($(this).html());
    //     });

    //     $('.sumwm span').html(sumwm);
    //    // console.log(sumwm)
        var sumwm = 0;
        $('.wm').each(function(i, obj) {
            sumwm += parseInt($(this).html());
        });
        var countItem = {{$countItem}};
        sumwm = sumwm / countItem;
        $('.sumwm span').html(sumwm.toFixed(1));
        })
    </script>
</body>
</html>