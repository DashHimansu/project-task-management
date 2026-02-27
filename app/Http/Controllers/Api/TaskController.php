<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Service layer instance.
     * We use the service layer to keep business logic
     * separate from the controller.
     */
    protected $taskService;
    /**
     * Inject TaskService using dependency injection.
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    /**
     * Display a listing of all taks.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Calling to taskSerive and return json API response
        try {
            $tasks = $this->taskService->getAllTasks();

            return response()->json([
                'success' => true,
                'data' => $tasks
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch tasks.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Display task by project id.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByProject($id)
    {
        // Calling to taskSerive and Return json API response
        try {
            $tasks = $this->taskService->getTasksByProject($id);

            return response()->json([
                'success' => true,
                'data' => $tasks
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch tasks for this project.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Dupdate the status of task.
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request, $id)
    {
        //validate request
        // We can apply form validation but i just keep it as simple
        try {

            $request->validate([
                'status' => 'required|in:pending,in_progress,completed'
            ]);
            
            $task = $this->taskService->updateTaskStatus($id, $request->status);

            return response()->json([
                'success' => true,
                'message' => 'Task status updated successfully.',
                'data' => $task
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to update task status.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
