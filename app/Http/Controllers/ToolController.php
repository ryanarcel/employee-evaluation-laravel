<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tool;
use App\ToolItem;
use App\Criterion;
use App\Category;

class ToolController extends Controller
{
    public function getTools(){
        $tools = Tool::all();
        return view('admin.tools')->with("tools", $tools);
    }

    public function getItems($id){
        $tool =  Tool::find($id);
        $items = $tool->items;

        if($id==1){
            return view('admin.toolItems')->with([
                'items' => $items,
                'id' => $id,
                'header' => $tool->toolname
            ]);
        }
        else if($id==2){
            $categories = Category::where('tool_id',"=",2)->get();

            return view('admin.admintool')->with([
                'categories' => $categories,
                'items' => $items,
                'id' => $id,
                'header' => $tool->toolname
            ]);
        }
        else if($id==3){
            $categories = Category::where('tool_id',"=",3)->get();

            return view('admin.supervisoryTool')->with([
                'categories' => $categories,
                'items' => $items,
                'id' => $id,
                'header' => $tool->toolname
            ]);
        }

        else if($id==4){
            $categories = Category::where('tool_id',"=",4)->get();

            return view('admin.ntpTool')->with([
                'categories' => $categories,
                'items' => $items,
                'id' => $id,
                'header' => $tool->toolname
            ]);
        }

    }

    public function storeCategory(Request $request, $id){
        //return $id;
        $category = new Category;
        $category->category = $request->category;
        $category->tool_id = $id;
        $category->save();
        return redirect()->back();
    }

    public function storeItem(Request $request){
        $item = new ToolItem;
        $item->statement = $request->statement;
        $item->tool_id = $request->toolId;
        $item->save();



      // return count($request->criterion);
       return redirect()->back();
     
    }

    public function storeCategoryItem(Request $request, $id){
        //return $id;

        $item = new ToolItem;
        $item->category_id = $id;
        $item->tool_id = $request->toolId;
        $item->statement = $request->statement;
        $item->save();

        $latestItemId = $item->id;

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
                //  echo ($i+1)." = ". $criterion[$i];
                //  echo "<br>";
            }
        }
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
