<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Task::with('project')->get()->map(function ($task) {
            return [
                'Title' => $task->title,
                'Project' => $task->project->name ?? '',
                'Assigned To' => $task->assigned_to,
                'Status' => $task->status,
                'Due Date' => $task->due_date,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Title',
            'Project',
            'Assigned To',
            'Status',
            'Due Date'
        ];
    }
}