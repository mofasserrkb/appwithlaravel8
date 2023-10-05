<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $tasks= Task::all();
       return view('index',compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
        'task_name'=>'required',
        'task_level'=>'required',
        'task_cate'=>'required',
        'task_desc_size'=>'required',
        'submit_email'=>'required',
        'task_desc'=>'required|max:1000',
        'task_photo'=>'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);
        $newImageName= time().'.'.$request->task_photo->extension();
        $request->task_photo->move(public_path('images'),$newImageName);

        Task::create([
            'task_name'=> $request->input('task_name'),
        'task_level'=> $request->input('task_level') ,
        'task_cate'=> $request->input('task_cate'),
        'task_desc_size'=>  json_encode($request->task_desc_size),
        'submit_email'=> $request->input('submit_email'),
        'task_desc'=> $request->input('task_desc'),
        'task_photo'=> $newImageName
        ]);


        return redirect()->route('task.index')->with('success','Task inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        // dd($task);
        return view('taskshow',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        $this->authorize('task_edit');
         return view('edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        $this->authorize('task_edit');
       // dd($request);
      // dd($task);
      $request->validate([
      'task_name'=>'required',
      'task_cate'=>'required',
      'task_desc_size'=>'required',
      'task_level'=>'required',
      'submit_email'=>'required',
      'task_desc'=>'required|max:1000'

      ]);
      if($request->hasFile('task_photo'))
      {
        $newImageName='';
        $oldImageName=public_path('images/'.$task->task_photo);
        $newImageName=time().'.'.$request->task_photo->extension();
        $request->task_photo->move(public_path('images'),$newImageName);
        unlink($oldImageName);
      }
      else{
             $newImageName=$task->task_photo;
      }
      $task->update([
        'task_name'=> $request->input('task_name'),
      'task_cate'=>$request->input('task_cate'),
      'task_desc_size'=> json_encode($request->task_desc_size),
      'task_level'=> $request->input('task_level'),
      'submit_email'=>$request->input('submit_email'),
      'task_desc'=>$request->input('task_desc'),
       'task_photo'=>$newImageName
      ]);
      return redirect()->route('task.index')->with('success','Task updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $this->authorize('task_delete');
      //  dd($task);
      unlink(public_path().'/images/'.$task->task_photo);
      $task->delete();
      return redirect()->route('task.index')->with('success','Task deleted successfully');
    }
}
