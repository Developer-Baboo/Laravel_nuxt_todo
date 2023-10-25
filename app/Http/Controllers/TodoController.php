<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Todo::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = Todo::create([
            'title' => $request->title,
            'is_done' => $request->is_done,
        ]);
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        // echo "REturn";
        // var_dump($request->title);
        // dd($request);
        //  dd($request->all());
        /*$data = $request->all();
        echo $data['email'];*/
        //echo $request->input('email');
        // echo $request->get('title');
        // die();
        // die
        // try {
            $todo->title = $request->title;
            $todo->is_done = $request->is_done;
            $todo->save();
            return response()->json($todo);

        // } catch (\Exception $e) {
        //     // Log the exception for debugging purposes
        //     Log::error($e);
        //     return response()->json(['error' => 'Internal Server Error'], 500);
        // }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(true);
    }


   public function updateStatus(Request $request, Todo $todo){
    $todo->is_done = $request->is_done;
    $todo->save();
    return response()->json(true);
   }
}
