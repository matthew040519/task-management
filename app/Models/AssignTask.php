<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTask extends Model
{
    use HasFactory;

    protected $table = 'tblassigntask';
    protected $fillable = [
        'task_id',
        'user_id',
        'assigned_by',
        'status',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_by', 'id');
    }

    public function assignto()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
