<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
