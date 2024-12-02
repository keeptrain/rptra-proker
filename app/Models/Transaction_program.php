<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Transaction_program extends Model
{

    use HasFactory;
    protected $table = "transaction_programs";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'status',
        'activity',
        'objective',
        'output',
        'target',
        'volume',
        'location',
        'schedule_activity',
        'principal_program_id',
        'information',
    ];

    public function priorityPrograms()
    {
        return $this->hasOneThrough(Priority_program::class, Principal_program::class, 'id', 'id', 'principal_program_id', 'priority_program_id');
    }

    public function principalPrograms()
    {
        return $this->belongsTo(Principal_program::class, 'principal_program_id');
    }

    public function institutionalPartners()
    {
        return $this->belongsToMany(Institutional_partners::class,'institutional_partner_transaction_program', 'transaction_program_id', 'institutional_partner_id');
    }
    
    public function get()
    {
        return self::all();
    }

    public function getCompletedStatus()
    {
        // Ambil data dengan status 'completed'
        $completedRecords = self::where('status', 'completed')->get();

        // Format tanggal di 'schedule_activity' menjadi nama hari, tanggal
        $completedRecords->map(function ($record) {
            $record->day_name = Carbon::parse($record->schedule_activity)->translatedFormat('l, d F Y');
            return $record;
        });

        return $completedRecords;
    }

    public function getDraftStatus()
    {
        $draftRecords = self::where('status', 'draft')->get();

        $draftRecords->map(function ($record) {
            $record->day_name = Carbon::parse($record->created_at)->translatedFormat('l, d F Y');
            return $record;
        });

        return $draftRecords;
    }
    
    public function generateId()
    {
        
    }

    public function storeTransactionProgram(
        $status,
        $activity,
        $objective,
        $output,
        $target,
        $volume,
        $location,
        $schedule_activity,
        $principal_program_id,
        $institutional_partner_ids,
        $information
    )
    {
    
        // Membuat transaksi baru
        $transaction = self::create([
            'status' => $status,
            'activity' => $activity,
            'objective' => $objective,
            'output' => $output,
            'target' => $target,
            'volume' => $volume,
            'location' => $location,
            'schedule_activity' => $schedule_activity,
            'principal_program_id' => $principal_program_id,
            'information' => $information,
            'timestamps' => Carbon::now()

        ]);

        // Decode JSON dari Tagify
        // $decodedPartners = json_decode($institutional_partner_ids, true);

        // Ambil hanya nilai `value`
        // $partnerIds = collect($decodedPartners)->pluck('value')->toArray();

        // Attach ke tabel pivot
        if (!empty($institutional_partner_ids)) {
            $transaction->institutionalPartners()->attach($institutional_partner_ids);
        }
    }

    public function editTransactionProgram($id)
    {
        return self::findOrFail($id);
    }

    public function updateTransactionProgram(
        $id,
        $status,
        $activity,
        $objective,
        $output,
        $target,
        $volume,
        $location,
        $schedule_activity,
        $principal_program_id,
        $institutional_partner_ids,
        $information
    ) {
    
        // Mengambil program yang ingin diupdate
        $program = $this->editTransactionProgram($id);

        // Melakukan update pada instance model
        $program->update([
            'status' => $status,
            'activity' => $activity,
            'objective' => $objective,
            'output' => $output,
            'target' => $target,
            'volume' => $volume,
            'location' => $location,
            'schedule_activity' => $schedule_activity,
            'principal_program_id' => $principal_program_id,
            'institutional_partner_ids' => $institutional_partner_ids,
            'information' => $information
    
        ]);

        // Mengupdate relasi pivot
        $program->institutionalPartners()->sync($institutional_partner_ids);
    
        // Mengembalikan objek yang telah diperbarui
        return $program;
    
    }

    public function destroyTransactionProgram($ids)
    {
        return self::whereIn('id', $ids)->delete();
    }

}
