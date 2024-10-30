<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Main_program extends Model
{
    protected $table = "main_programs";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id','priority_program_id','name'];

    public function priorityProgram()
    {
        return $this->belongsTo(Priority_program::class, 'priority_program_id');
    }
}
