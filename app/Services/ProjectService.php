<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

class ProjectService
{
    //Declare Project Repository instance.
    protected $projectRepo;


    //Inject ProjectRepository using dependency injection.
    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepo = $projectRepo;
    }
    // Get all projects.
    public function getAllProjects()
    {
        return $this->projectRepo->getAll();
    }
}