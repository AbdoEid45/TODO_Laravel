<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// In Todo.php model
class Todo extends Model
{
    protected $fillable = ['name', 'description'];
}

