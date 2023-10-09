<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'dueDate',
        'user_id',
      ];
    
      public function user()
      {
        return $this->belongsTo(User::class);
      }

}
