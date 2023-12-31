<?php

namespace App\Http\Controllers\TaskControllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json(['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'assignee_id' => 'required|exists:users,id',
            'due_date' => 'required|date',
            'status_id' => 'required|exists:statuses,id',
            'project_id' => 'required|exists:projects,id',
            'priority' => 'required|in:high,medium,low',
            'estimated_time' => 'nullable|date_format:Y-m-d H:i:s',
            'actual_time' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $task = Task::create($request->all());

        return response()->json(['task' => $task, 'message' => 'Task created successfully'], 201);
    }

    public function show(Task $task)
    {
        return response()->json(['task' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'assignee_id' => 'nullable|exists:users,id',
            'due_date' => 'nullable|date',
            'status_id' => 'nullable|exists:statuses,id',
            'project_id' => 'nullable|exists:projects,id',
            'priority' => 'nullable|in:high,medium,low',
            'estimated_time' => 'nullable|date_format:Y-m-d H:i:s',
            'actual_time' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $task->update($request->all());

        return response()->json(['task' => $task, 'message' => 'Task updated successfully']);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
