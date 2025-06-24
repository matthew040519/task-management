<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tbltasks';
    protected $fillable = [
        'file_name',
        'task_name',
        'task_description',
        'due_date',
        'priority_id',
        'category_id',
        'status_id',
        'created_by',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function priority()
    {
        return $this->hasOne(Priority::class, 'id', 'priority_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    
    public function assignTasks()
    {
        return $this->hasMany(AssignTask::class, 'task_id', 'id');
    }
}
