@extends('layouts.master')
@section('title')
    Supervisory Evaluation
@stop
@section("styles")
    <style>
        .item-link, .item-link:hover {
            text-decoration: none;
            color: #000;
        }    
        .item-statement{
            width: 80%;
            height: 100px;
        }
        .statementText{
            border: 0px;
            resize: none;
        }
        body{
            background: #f7f7f7;
        }
        .add-criteria{
            position: absolute;
            top: 100px;
            left: 10px;
        }
        .center {
            padding-left: auto;
            padding-right: auto;
            text-align: center;
        }
        .for-review{
            background-color: transparent;
            border:none;
        }
        #view-criteria{
            width: 400px;
            list-style: none;
            display: none;
        }

    </style>
@stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5">{{$header}}</h1>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow pt-4 pb-4 pr-3">
                <ul id="item-list" class="list-group">
                    @foreach($categories as $category)
                    <li class="list-li list-group-item ml-3">            
                    <b>{{$category->category}}<a href="#" class=' ml-2' onClick="itemform({{$category->id}})" data-toggle="modal" data-target="#modal-addCategoryItem"><span data-feather="plus-square"></span></a></b>
                    <input type="hidden" name="toolId" value="2">
                        <ul>
                            @foreach($category->items as $item)
                            <li class="mt-2 mb-2">            
                                <a href="#" class='item-link' >{{$item->statement}}</a>
                                <input type="hidden" value="{{$item->id}}">
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="#" class="list-item text-dark" id="btn-addCategory" data-toggle="modal" data-target="#modal-addCategory">
                        <span data-feather="plus" class="mr-2"></span> 
                        Add Category<span class="sr-only"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

<!-- add category modal -->
<div class="modal" tabindex="-1" id="modal-addCategory">
  <div class="modal-dialog">
  <form action="{{route('storeCategory', $id)}}" method="post">
    @csrf
    <input type="hidden" name="toolId" value="2">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Category</h5>
        <button type="button" id="btn-close" data-dismiss="modal" data-feather="x" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label >Category</label>
                <input type="text" class="form-control" name="category" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="closeCatModal" data-dismiss="modal">Close</button>
        <input type="submit" value="Save" class="btn btn-primary"/>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- add item per category -->
<div class="modal"  id="modal-addCategoryItem">
  <div class="modal-dialog">
  <form method="post" id="itemForm">
    @csrf
    @method('POST')
    <input type="hidden" name="toolId" value="2">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Item</h5>
        <button type="button" class="btn-close2" data-dismiss="modal" data-feather="x" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label >Item Statement</label>
                <textarea class="form-control" name="statement" style="height:200px" required></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="closeItemModal" data-dismiss="modal">Close</button>
        <input type="submit" value="Save" class="btn btn-primary"/>
      </div>
    </div>
    </form>
  </div>
</div>

            <!--update delete modal-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="item-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tool Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="col-md-10 offset-md-1" id="form-updateItem" method="post">
                @csrf
                <textarea name="statement" class="form-control mt-3 mb-2 statementText"></textarea>
                <div class="col-md-6 offset-md-4 mb-3">
                <button class="btn btn-success">Update</button>                            
                <a class="btn btn-danger" id="btn-delItem">Delete</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script>
    $(document).ready(function(){
        $('#btn-addCategory').click(function(){
            $('#modal-addCategory').fadeIn(300);
        });

        $('.item-link').click(function(){
             var statementText = $(this).html();
            // alert(statementText)
             var id = $(this).next().val();
            // $('.statementText').val(id);
             $('.statementText').val(statementText);
             $('#item-modal').modal('show');
             $('#form-updateItem').attr("action", "/updateItem/"+id)
             $('#btn-delItem').attr("href", "/deleteItem/"+id);
         });

         $("#btn-delItem").click(function(e){
             if (!confirm('Are you sure?'))
                 e.preventDefault();
         });
    
    })
</script>
<script>
    function itemform(i){
        $('#itemForm').attr("action", "/storeCategoryItem/"+i);
        $('#modal-addCategoryItem').fadeIn(300);
    }
</script>
@stop
