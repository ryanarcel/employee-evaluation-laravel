<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tool;
use App\ToolItem;
use App\Criterion;

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
        $item = new ToolItem;
        $item->statement = $request->statement;
        $item->tool_id = $request->toolId;
        $item->save();

        $latestItemId = ToolItem::latest()->first();

        if(isset($request->criterion)){
            $criterion = $request->criterion;
            $arraySize = count($request->criterion);

            for($i=0; $i<$arraySize; $i++){
                Criterion::create([
                    "tool_id" => $request->toolId,
                    "item_id" => $latestItemId,
                    "criterion" => $criterion[$i],
                    "points" => ($i+1)
                ]);
                // echo ($i+1)." = ". $criterion[$i];
                // echo "<br>";
            }
        }

       // return count($request->criterion);
        return redirect()->back();
     
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
