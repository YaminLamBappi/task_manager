<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view("tasks.index",compact("tasks"));
    }

    public function form(){
        return view("tasks.form");
    }



    public function create(Request $request){
        $request ->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|nullable|string',

        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('tasks.index')->with('message', 'Task created successfully.');
    }


    public function edit($id){

        $task = Task::find($id);
        return view('tasks.edit', compact('task'))->with('message', 'Task edited successfully.');
    }

    public function update(Request $request, Task $task){

        $request ->validate([
            'title'=> 'required|string|max:255',
        ]);

        $task->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'is_completed' => $request->has('is_completed'),
        ]);

        return redirect()->route('tasks.index')->with('message', 'Task updated successfully.');
    }

    public function destroy(Task $task){
        $task->delete();

        return redirect()->route('tasks.index')->with('message', 'Task deleted successfully.');
    }


    //
}
