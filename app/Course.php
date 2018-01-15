<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'course';

    public $timestamps = false;

    public function students()
    {
        return $this->hasMany('Students');
    }
}
