<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\ListByProjectTaskRequest;
use App\Services\ProjectService;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService = null;

    function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    function index()
    {
        $projects = (new ProjectService())->getAll();
        return view('index', compact('projects'));
    }

    function listByProject(int $id)
    {
        $tasks = $this->taskService->listByProject($id);
        return response()->json([
            'tasks' => $tasks,
            'success' => true,
            'message' => "Tasks get successfully"
        ]);
    }

    function get($id)
    {
        $task = $this->taskService->getById($id);
        return response()->json([
            'task' => $task,
            'success' => true,
        ]);
    }

    function store(CreateTaskRequest $request)
    {
        $this->taskService->store($request->all());
        return response()->json([
            'success' => true,
            'message' => "Tasks created successfully"
        ]);
    }

    function update(CreateTaskRequest $request, int $id)
    {
        $this->taskService->update($id, $request->all());
        return response()->json([
            'success' => true,
            'message' => "Task updated successfully"
        ]);
    }

    function delete(int $id)
    {
        $this->taskService->delete($id);
        return response()->json([
            'success' => true,
            'message' => "Task deleted successfully"
        ]);
    }
}
