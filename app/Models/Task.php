<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
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
