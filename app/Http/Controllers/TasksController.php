<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Task;
use Session;

class TasksController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	return view('welcome',compact('user'));
    }

    public function add()
    {
    	return view('add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'characteristic'=> 'required|min:2|max:255',
        ]);

        // 'characteristic' = >'required|unique:posts|max:255',
        //     'body'=>'required',
        

    	$task = new Task();
    	$task->characteristic= $request->characteristic;
    	$task->user_id = Auth::id();
        $task->save();
        
        Session::flash('success','Task has been successfully created!');
       
        return redirect('/'); 
        
    }

    public function edit(Task $task)
    {

    	if (Auth::check() && Auth::user()->id == $task->user_id)
        {            
                return view('edit', compact('task'));
        }           
        else {
             return redirect('/');
         }            	
    }

    public function update(Request $request, Task $task)
    {
    	if(isset($_POST['delete'])) {
    		$task->delete();
    		return redirect('/');
    	}
    	else{
    		$task->characteristic = $request->characteristic;
	    	$task->save();
	    	return redirect('/'); 
        }   
        if($validator_>fails()){
            return redirect('/')->withInput()->withErrors($validator);
        } 	
    }
}