<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $table = 'tasks';
    public $guarded = [];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
