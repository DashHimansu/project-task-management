<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public function getAll()
    {
        // Fetch all projects and append task count for each project
        return Project::withCount('tasks')->get();
    }
}