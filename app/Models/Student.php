<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','birth', 'gerder', 'classroom_id'];
    /**@api
     *
     *
     */


    public function classroom()

    {
        return $this->belongsTo("App\Models\Classroom");
    }
}
