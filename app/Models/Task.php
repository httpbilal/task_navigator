<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'due_date', 'status_id', 'project_id', 'priority', 'estimated_time', 'actual_time'];

    public function assignees()
    {
        return $this->belongsToMany(User::class, 'tasks_users');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
