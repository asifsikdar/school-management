<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function discount(){
        return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
    }

    public function studentclass(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function studentyear(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }

    public function studentgroup(){
        return $this->belongsTo(StudentGroup::class,'group_id','id');
    }

    public function studentshift(){
        return $this->belongsTo(StudentShift::class,'shift_id','id');
    }
   
}
