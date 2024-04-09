<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'student_id','id');
    }
}
