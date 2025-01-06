<?php
namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getTasks()
    {
        return $this->taskService->getAllTasks();
    }

    public function storeTask(Request $request)
    {
        $validatedData = $request->validate([
            'task' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return $this->taskService->createTask($validatedData);
    }

    public function getTaskById($id)
    {
        return $this->taskService->getTaskById($id);
    }

    public function updateTask(Request $request, $id)
    {
        $validatedData = $request->validate([
            'task' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return $this->taskService->updateTask($id, $validatedData);
    }

    public function deleteTask($id)
    {
        return $this->taskService->deleteTask($id);
    }
}
