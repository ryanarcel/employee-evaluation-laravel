<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tool;
use App\ToolItem;

class ToolController extends Controller
{
    public function getTools(){
        $tools = Tool::all();
        return view('admin.tools')->with("tools", $tools);
    }

    public function getItems($id){
        $tool =  Tool::find($id);
        $items = $tool->items;

        return view('admin.toolItems')->with([
            'items' => $items,
            'id' => $id,
            'header' => $tool->toolname
            ]);
    }

    public function storeItem(Request $request){
        // $item = new ToolItem;
        // $item->statement = $request->statement;
        // $item->tool_id = $request->toolId;
        // $item->save();

        $criteria = [];

        for($i=0; $i<count($request->points);  $i++){
            $criteria[$request->points] = $request->criterion;
        }
        return $criteria;
     
    }

    public function updateItem(Request $request, $id){
        //return $id;
        $item = ToolItem::find($id);
        $item->statement = $request->statement;
        $item->save();
        return redirect()->back();
    }

    public function deleteItem($id){
        $item = ToolItem::find($id);
        $item->delete();
        return redirect()->back();
    }
    

}
