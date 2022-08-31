<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'       => 'required',
            'project_id' => 'nullable|exists:projects,id',
        ]);
        $maxPrioroty = Tasks::max('priority') ?: 0;

        $newTask             = new Tasks();
        $newTask->task_name  = $request->name;
        $newTask->project_id = $request->project_id;
        $newTask->priority   = ++$maxPrioroty;

        $newTask->save();

        return redirect()->route('home');
    }



    public function setPriority(Request $request)
    {
        //
        // dd($request->all());
        $update = $request->update;
        $positions = $request->positions;
        //dd( $positions);

        if (isset($update)) {
            foreach ($positions as $position) {
                $index = $position[0];
                $newPosition = $position[1];

                $task = Tasks::find($index);

                $task->priority = $newPosition;
                $task->save();
            }

            // return redirect()->route('home');
        }



        return redirect()->route('home');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // $projectId = $request->project_id;
        $taskNameOld = $request->task_name_old;
        $taskName = $request->task_name;

        // dd($taskNameOld);

        $taskId = Tasks::select('id')->where('task_name', $taskNameOld)->first();
        $id = $taskId->id;
        $task = Tasks::find($id);
        $task->task_name = $taskName;
        $task->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        //
        // dd($request->all());
        $id = $request->id;

        Tasks::where('id', $id)->delete();

        return true;
    }
}
