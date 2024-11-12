<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction_program extends Model
{
    protected $table = "transaction_programs";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'activity',
        'objective',
        'output',
        'target',
        'volume',
        'schedule_activity',
        'main_program_id',
        'institutional_partner_id',
        'information',
    ];

    public function get()
    {
        return self::all();
    }
}
