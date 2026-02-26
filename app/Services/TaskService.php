<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    //Declare Task Repository instance.
    protected $taskRepo;
    //Inject ProjectRepository using dependency injection.
    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }
    // get all Tasks by calling taskRepo getAll method
    public function getAllTasks()
    {
        return $this->taskRepo->getAll();
    }
 // Retrieve Tasks by calling taskRepo getByProjectId method with project id
    public function getTasksByProject($id)
    {
        return $this->taskRepo->getByProjectId($id);
    }
  // Ppdate task status with id and status by calling task repo updateStatus method
    public function updateTaskStatus($id, $status)
    {
        return $this->taskRepo->updateStatus($id, $status);
    }
}