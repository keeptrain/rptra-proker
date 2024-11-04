<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priority_program extends Model
{
    //
    protected $table = "priority_programs";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id','name'];

    public function get() {

    }
    
}
