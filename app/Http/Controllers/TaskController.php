<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plan = auth()->user()->plan;
        return view('task.index',[
        'plan' => $plan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dateEnd' => 'after_or_equal:today',
        ],[
            'dateEnd.after_or_equal' => 'Дата введена некорректно (возможно вы указали дату прошлого)',
        ]);

        $new_task = new Plan;
        $new_task->user_id = auth()->user()->id;
        $new_task->name = $request->input('name');
        $new_task->text = $request->input('description');
        $new_task->data_end = $request->input('dateEnd');
        $new_task->token = "token";
        $new_task->save();

        return redirect('task');

    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $token = Plan::find($id);
        $token->token = ''; 
        $token->save(); 
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Plan::find($id)->delete();
        return redirect()->back();
    }

}
