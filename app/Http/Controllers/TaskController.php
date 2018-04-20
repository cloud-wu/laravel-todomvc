<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::orderBy('created_at', 'asc')->get();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return ['message' => 'Task created!'];
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return ['message' => 'Task deleted!'];
    }
}
