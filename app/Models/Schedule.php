<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['start','end','title','schedule_user','schedule_job'];

    public function user()
    {
        return $this->belongsTo(User::class,'schedule_user');
    }

}
