<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Principal_program extends Model
{
    protected $table = "principal_programs";
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

    public function editPrincipalProgram($id){
        return self::findOrFail($id);
    }

    public function updatePrincipalProgram($id, $priorityId, $prefix, $prefixNumber, $name)
    {

       // Dapatkan program berdasarkan $id menggunakan metode editPriorityProgram
        $programId = $this->editPrincipalProgram($id);

        $getPriorityId = $programId->priority_program_id;

         // Buat custom ID berdasarkan prefix dan nomor
        $customId = $prefix . '-' . str_pad($prefixNumber, 3, '0', STR_PAD_LEFT);

        // Update data pada record yang ditemukan
        $programId->update([
        'id' => $customId,
        'priority_program_id' => $priorityId ?? $getPriorityId,
        'name' => $name,
        ]);

        return $programId;
    }

    public function destroyPrincipalPrograms($principalIds) 
    {
        return self::whereIn('id', $principalIds)->delete();
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
