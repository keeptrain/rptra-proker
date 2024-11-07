<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutional_partners extends Model
{
    
    protected $table = "institutional_partners";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'name'];

    public function get() {
        return self::all();
    }

    public function getPaginate() {
        return self::paginate(8);
    }

    public function storeInstituionalPartner($prefix, $prefixNumber, $name) {

        $customId = $prefix . '-' . str_pad($prefixNumber, 3, '0', STR_PAD_LEFT);

        return self::create([
            'id' => $customId,
            'name' => $name,
        ]);
    }

    public function editInstitutionalParner($id){
        return self::findOrFail($id);
    }

    public function destroyInstituionalPartners($partnerIds) 
    {
        return self::whereIn('id', $partnerIds)->delete();
    }
}
