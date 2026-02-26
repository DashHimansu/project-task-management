<?php

namespace App\Http\Controllers\Api;

use App\Services\ProjectService;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Service layer instance.
     * We use the service layer to keep business logic
     * separate from the controller.
     */
    protected $projectService;
    /**
     * Inject ProjectService using dependency injection.
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }
    /**
     * Display a listing of all projects.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {

            // Call service layer to fetch project data
            $projects = $this->projectService->getAllProjects();

            // Return json API response
            return response()->json([
                'success' => true,
                'data' => $projects
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching projects.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
