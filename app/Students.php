<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student';

    public $timestamps = false;


    public function course()
    {
        return $this->belongsTo('Course');
    }

    public function address()
    {

        return $this->hasOne('StudentAddresses', 'id');

    }
}
