<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',    
    ];

    public function tasks(){
        return $this->hasMany(Tasks::class);
    }

    public function scopeHasTasks($q){
        return $q->whereHas('tasks');
    }
}
