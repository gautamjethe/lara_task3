<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function add(Request $request){
        // echo "Hello Gautam";
        request()->all();
        $todo = new Task;
        $todo->user_id = $request->user_id;
        $todo->task = $request->task;
        $rr = $todo->save();
        if($rr){
            return ["taskObject"=>"$request->task","status"=>"1","message"=>"successfully created a task"];
        }
        else{
            return ["taskObject"=>"$request->task","status"=>"0","message"=>"Operation failed"];
        }      
        

    }
    public function status(Request $request)
    {
        request()->all();
        $st = new Task;
        
        $d = DB::table('tasks')
                ->where('id', $request->task_id)
                ->update(['status' =>$request['status']                
                ]);
        if($d){
            return ["taskObject"=>"$request->status","status"=>"1","message"=>"Marked task as $request->status"];
        } 
        else{
            return ["taskObject"=>"$request->status","status"=>"0","message"=>"Failed"];
        }       

    }

    public function list()
    {
        $id=Auth::user()->id;
        $results = DB::table('tasks')->select('id','user_id','task','status','created_at','updated_at')
        ->where('user_id' ,$id)->get();
        
        return view('dashboard',['list'=>$results]);

    }

    public function edit($id){
        $results = DB::table('tasks')->select('id','user_id','task','status','created_at','updated_at')
        ->where('id' ,$id)->first();
        
        return view('edit',['list'=>$results]);
    }
}
