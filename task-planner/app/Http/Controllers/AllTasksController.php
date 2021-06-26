<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $tasks = DB::table('tasks')
            ->where('user_id', $user->id)
            ->join('status', 'tasks.status', '=', 'status.id')
            ->select('tasks.*', 'status.status')
            ->get();

        return view('tasks.all.index', compact('user', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.all.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = DB::select("select * from tasks where id= $id");
        return view('tasks.all.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $greeting = task::find($id);
        $greeting->delete();
        return redirect('/tasks');
    }
}
