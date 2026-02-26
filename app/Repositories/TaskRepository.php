<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    // Fetch all task with relation of project for each task
    public function getAll()
    {

        return Task::with('project')->get();
    }


    // Fetch task with project id
    public function getByProjectId($id)
    {
        return Task::where('project_id', $id)->get();
    }
    // update the status of requested task
    public function updateStatus($id, $status)
    {
        $task = Task::findOrFail($id);
        $task->update(['status' => $status]);
        return $task;
    }
}
