<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'project_id',
    ];

    public function project(){
        return $this->belongsTo(Projects::class);
    }

    public function scopeWhereProject($q, $id){
        $q->where('project_id', $id);
    }
}
