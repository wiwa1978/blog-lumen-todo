<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function options()
    {
        //
    }

    public function options1()
    {
        //
    }

    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    public function show($id)
    {
        $todo = Todo::find($id);

        if (! $todo == null) {
            return response()->json($todo);
        } else {
            return response()->json(['status' => 'fail']);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'completed' => 'required',
         ]);


        $todo = new Todo();
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->completed = $request->completed;
        $todo->save();
        return response()->json(['status' => 'success']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'completed' => 'required',
         ]);

        $todo = Todo::find($id);
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->completed = $request->completed;
        $todo->save();


        return response()->json(['status' => 'success']);
    }

    public function destroy($id)
    {
        //
        if (Todo::destroy($id)) {
            return response()->json(['status' => 'success']);
        }
    }
}
