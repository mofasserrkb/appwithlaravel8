<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $fillable=[ 'task_name',
   'task_level',
   'task_desc',
   'task_photo',
   'task_cate',
   'task_desc_size',
   'submit_email'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
