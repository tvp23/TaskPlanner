<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $user_id = $user->id;

        $tasks_all = DB::table('tasks')->where('user_id', $user->id)->count();
        $tasks_completed = DB::table('tasks')->where('user_id', $user->id)->where('status', 1)->count();
        $tasks_current = DB::table('tasks')->where('user_id', $user->id)->where('status', 2)->count();
        $tasks_on_hold = DB::table('tasks')->where('user_id', $user->id)->where('status', 3)->count();
        $tasks_canceled = DB::table('tasks')->where('user_id', $user->id)->where('status', 4)->count();
        return view('dashboard',compact('tasks_all', 'tasks_completed', 'tasks_current', 'tasks_on_hold', 'tasks_canceled', 'user'));
    }

    public function all_tasks()
    {
        $user = auth()->user();

        $tasks = DB::select("select * from tasks where user_id=$user->id");
        $user = DB::table('users')->where('id', $user->id)->value('name');
        return view('tasks.index', compact('tasks', 'user'));
    }

    public function completed()
    {
        $user = auth()->user();

        $tasks = DB::select("select * from tasks where user_id=$user->id and status=1");
        $user = DB::table('users')->where('id', $user->id)->value('name');
        return view('tasks.completed', compact('tasks', 'user'));
    }

    public function current()
    {
        $user = auth()->user();

        $tasks = DB::select("select * from tasks where user_id=$user->id and status=2");
        $user = DB::table('users')->where('id', $user->id)->value('name');
        return view('tasks.current', compact('tasks', 'user'));
    }

    public function on_hold()
    {
        $user = auth()->user();

        $tasks = DB::select("select * from tasks where user_id=$user->id and status=3");
        $user = DB::table('users')->where('id', $user->id)->value('name');
        return view('tasks.on-hold', compact('tasks', 'user'));
    }

    public function canceled()
    {
        $user = auth()->user();

        $tasks = DB::select("select * from tasks where user_id=$user->id and status=4");
        $user = DB::table('users')->where('id', $user->id)->value('name');
        return view('tasks.canceled', compact('tasks', 'user'));
    }

    public function show($id)
    {
        $task = DB::select("select * from tasks where id= $id");
        return view('tasks.show', compact('task'));
    }

    public function create(){
        return view('tasks.all.create');
    }

    public function store(Request $request)
    {
        $task = new task([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'message' => $request->message,
            'Priority' => $request->priority,
            'deadlinedate' => $request->deadlinedate,
            'deadlinetime' => $request->deadlinetime,
            'status' => $request->status,
        ]);
        $task->save();
        return redirect('/tasks');
    }

    public function edit($id)
    {
        $task = task::find($id);
        return view('tasks.all.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = task::find($id);
        $task->user_id = $request->user_id;
        $task->title = $request->title;
        $task->Priority = $request->priority;
        $task->deadlinedate = $request->deadlinedate;
        $task->deadlinetime = $request->deadlinetime;
        $task->status = $request->status;
        $task->save();
        return redirect('/tasks');
    }

    public function destroy($id)
    {
        $greeting = task::find($id);
        $greeting->delete();
        return redirect('/tasks');
    }
}
