<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSpace extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capacity', 'owner'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'workspace');
    }
}
