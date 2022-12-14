<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function teachers() {
        return $this->hasMany(Teacher::class);
    }
}
