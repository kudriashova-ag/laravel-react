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
        return view('index', 'projects');
    }

    function listByProject(ListByProjectTaskRequest $request)
    {
        $tasks = $this->taskService->listByProject($request->project_id);
        return response()->json([
            'tasks' => $tasks,
            'success' => true,
            'message' => "Tasks get successfully"
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
}
