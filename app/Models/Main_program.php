<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Main_program extends Model
{
    protected $table = "main_programs";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id','priority_program_id','name'];

    public function get() {
        return self::all();
    }

    public function getPaginate()
    {
        return self::paginate(5);
    }
    
    public function priorityProgram()
    {
        return $this->belongsTo(Priority_program::class, 'priority_program_id');
    }

    public function storePrincipalProgram($prefix, $prefixNumber, $priorityId, $name) {

        $customId = $prefix . '-' . str_pad($prefixNumber, 3, '0', STR_PAD_LEFT);

        return self::create([
            'id' => $customId,
            'priority_program_id' => $priorityId,
            'name' => $name,
        ]);
    }

    public function destroyPrincipalPrograms($principalIds) 
    {
        return self::whereIn('id', $principalIds)->delete();
    }
}
