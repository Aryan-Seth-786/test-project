<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::of(Auth::user())->get();
        return view('task.index',['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request->all());
        $t = new Task();
        $t->title = $request->all()['title'];
        $t->content = $request->all()['content'];
        $t->status = false;
        $t->user_id = Auth::user()->id;
        $t->remind_on = $request->all()['date'];
        $t->save();
        

        // $this->index();
        // $tasks = Task::of(Auth::user())->get();
        // ddd($tasks);
        session()->flash('status', 'the task you just created will be at the top');
        return redirect('/task');
        // return view('task.index',['tasks' => $tasks]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('task.edit',['task'=>Task::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $t = Task::findOrFail($id);
        $t->title = $request->all()['title'];
        $t->content = $request->all()['content'];
        $t->remind_on = $request->all()['date'];
        $t->save();
        session()->flash('status','the task was updated and will be at the top');
        return redirect('/task');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = Task::findOrFail($id);
        $t->delete();
        session()->flash('status','the task was deleted');
        return redirect('/task');
    }
    
    public function updateStatus(Request $request,int $id)
    {
        // return response($id);
        $task = Task::findOrFail($id);
        $tsk = $request->all()['task'];
        // return response($tsk);
        if ($tsk == 'status to true'){
            if ($task->status == true) {
                return response('already true');
            }
            $task->status = True;
        } elseif ($tsk == 'status to false') {
            if ($task->status == false) {
                return response('already false');
            }
            $task->status = false;
        }
        // Log::debug('before save');
        $task->save();
        return response($task->status);
        // Log::debug('after response');
        // ddd($request->all());
        // dd($request->all());
    }
}
