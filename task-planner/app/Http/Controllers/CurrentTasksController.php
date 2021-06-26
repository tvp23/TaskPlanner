<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrentTasksController extends Controller
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
            ->where('user_id','=', $user->id)
            ->where('tasks.status', '=', 2)
            ->join('status', 'tasks.status', '=', 'status.id')
            ->select('tasks.*', 'status.status')
            ->get();
        return view('tasks.current.index', compact('tasks', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.current.create');
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
        return redirect('/current_tasks');
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
        return view('tasks.current.show', compact('task'));
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
        return view('tasks.current.edit', compact('task'));
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
        return redirect('/current_tasks');
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
        return redirect('/current_tasks');
    }
}
