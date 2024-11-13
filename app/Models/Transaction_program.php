<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Transaction\StoreTransactionRequest;

class Transaction_program extends Model
{

    use HasFactory;
    protected $table = "transaction_programs";
    protected $primaryKey = 'id';
    public $incrementing = true;


    protected $fillable = [
        'status',
        'activity',
        'objective',
        'output',
        'target',
        'volume',
        'location',
        'schedule_activity',
        'main_program_id',
        'information',
    ];

    /*protected $fillable = [
        'status',
        'information'
    ];*/

    public function get()
    {
        return self::all();
    }
    
    public function institutionalPartners()
    {
        return $this->belongsToMany(Institutional_partners::class,'institutional_partner_transaction_program', 'transaction_program_id', 'institutional_partner_id');
    }

    public function generateId()
    {
        
    }

    public function storeTransactionProgram(
        $activity,
        $objective,
        $output,
        $target,
        $volume,
        $location,
        $schedule_activity,
        $main_program_id,
        $institutional_partner_ids,
        )
    {
    
        // Membuat transaksi baru
        $transaction = self::create([
            'activity' => $activity,
            'objective' => $objective,
            'output' => $output,
            'target' => $target,
            'volume' => $volume,
            'location' => $location,
            'schedule_activity' => $schedule_activity,
            'main_program_id' => $main_program_id,
        ]);

        if (!empty($institutional_partner_ids)) {
            $transaction->institutionalPartners()->attach($institutional_partner_ids);
        }
    }

    public function storeToDraft()
    {
        return self::create([
            'status' => 'draft',
        ]);
    }
}
