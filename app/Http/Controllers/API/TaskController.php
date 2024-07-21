<?php

namespace App\Http\Controllers\API;

use App\Events\TaskCreationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreationRequest;
use App\Services\TaskService;

class TaskController extends Controller
{
    public function store(TaskCreationRequest $request, TaskService $taskService)
    {

//        TaskCreationEvent::dispatch($request->toDto());
        $result = $taskService->create($request->toDto());

        return $result;
    }

    public function index()
    {
    }
}
