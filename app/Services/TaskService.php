<?php

namespace App\Services;

use App\Models\Task;
use App\Traits\ResponseTrait;

class TaskService
{
    use ResponseTrait;

    /**
     * Get all tasks.
     */
    public function getAllTasks()
    {
        try {
            $tasks = Task::all();
            return $this->successResponse($tasks, 'Tasks retrieved successfully.');
        } catch (\Exception $e) {
            return $this->failureResponse('Failed to retrieve tasks.', 500, [$e->getMessage()]);
        }
    }

    /**
     * Create a new task.
     */
    public function createTask($data)
    {
        try {
            $task = Task::create($data);
            return $this->successResponse($task, 'Task created successfully.', 201);
        } catch (\Exception $e) {
            return $this->failureResponse('Failed to create task.', 500, [$e->getMessage()]);
        }
    }

    /**
     * Get a task by ID.
     */
    public function getTaskById($id)
    {
        try {
            $task = Task::findOrFail($id);
            return $this->successResponse($task, 'Task retrieved successfully.');
        } catch (\Exception $e) {
            return $this->failureResponse('Failed to retrieve task.', 500, [$e->getMessage()]);
        }
    }

    /**
     * Update an existing task.
     */
    public function updateTask($id, $data)
    {
        try {
            $task = Task::findOrFail($id);
            $task->update($data);
            return $this->successResponse($task, 'Task updated successfully.');
        } catch (\Exception $e) {
            return $this->failureResponse('Failed to update task.', 500, [$e->getMessage()]);
        }
    }

    /**
     * Delete a task.
     */
    public function deleteTask($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();
            return $this->successResponse([], 'Task deleted successfully.');
        } catch (\Exception $e) {
            return $this->failureResponse('Failed to delete task.', 500, [$e->getMessage()]);
        }
    }
}
