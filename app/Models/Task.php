<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'assigned_to',
        'status',
        'attachment',
        'due_date'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
