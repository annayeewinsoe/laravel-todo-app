<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests\CreateTodoRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all = Todo::orderBy('created_at', 'desc')->with(['user'])->get();
        $my = Todo::where('creator_id', auth()->user()->id)->orderBy('created_at', 'desc')->with(['user'])->get();
        return view('home', compact('all', 'my'));
    }

    public function change_completed(Request $request)
    {
        $todo = Todo::where('id', $request['id'])->first();
        if($todo && $todo->creator_id === auth()->user()->id) {
            $result = $todo->change_completed();
            return redirect()->route('home')->with('message', 'Completed changed to '.$result);
        }
    }

    public function create_todo()
    {
        return view('create_todo');
    }

    public function store_todo(CreateTodoRequest $request)
    {
        Todo::create([
            'title' => $request->title,
            'completed' => false,
            'creator_id' => auth()->user()->id
        ]);

        return redirect()->route('home')->with('message', 'A new todo was created successfully.');
    }

    public function delete_todo(Todo $todo)
    {
        if($todo && $todo->creator_id === auth()->user()->id) {
            $todo->delete();
            return redirect()->route('home')->with('message', 'The todo was deleted successfully.');
        }
        return redirect()->route('home')->with('message', 'Such todo does not exit. Redirected back to home page.');
    }
}
