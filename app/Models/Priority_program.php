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

    public function get() 
    {
        return self::all();
    }

    public function getPaginate() 
    {
        return self::paginate(5);
    }

    public function storePriorityProgram($prefix, $prefixNumber, $name) 
    {
        
        // Combine prefix and number for customId
        $customId = $prefix . '-' . str_pad($prefixNumber, 3, '0', STR_PAD_LEFT);

        return self::create([
            'id' => $customId,
            'name' => $name,
        ]);
    }

    public function editPriorityProgram($id)
    {
        return self::findOrFail($id);
    }


    public function updatePriorityProgram($id, $prefix, $prefixNumber, $name)
    {

       // Dapatkan program berdasarkan $id menggunakan metode editPriorityProgram
        $program = $this->editPriorityProgram($id);

         // Buat custom ID berdasarkan prefix dan nomor
        $customId = $prefix . '-' . str_pad($prefixNumber, 3, '0', STR_PAD_LEFT);

        // Update data pada record yang ditemukan
        $program->update([
        'id' => $customId,
        'name' => $name,
        ]);

        return $program;
    }

    public function destroyPriorityPrograms($priorityIds) 
    {
        return self::whereIn('id', $priorityIds)->delete();
    }

    public function separatedId()
    {
        $idParts = explode('-', $this->id);
        return [
            'prefix' => $idParts[0] ?? '',
            'number' => $idParts[1] ?? ''
        ];
    }
    
}
