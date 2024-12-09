<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_programs', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->enum('status', ['draft', 'completed'])->default('draft');
            $table->text('activity')->nullable(true);
            $table->text('objective')->nullable(true);
            $table->text('output')->nullable(true);
            $table->text('target')->nullable(true);
            $table->integer('volume')->nullable(true);
            $table->text('location')->nullable(true);
            $table->dateTime('schedule_activity')->nullable(true);
            $table->string('principal_program_id', length: 50)->nullable(true);
            //$table->string('instituional_partner_id', length: 50)->nullable(true);
            $table->enum('information', ['belum_terlaksana', 'terlaksana', 'tidak_terlaksana'])->default('belum_terlaksana');
            $table->timestamps();

            // Foreign key to priority_program (id)
            $table->foreign('principal_program_id')->references('id')->on('principal_programs')->onUpdate('cascade')->onDelete('cascade');

            /* Foreign key to institutional_partners (id)
            $table->foreign('instituional_partner_id')
            ->references('id')
            ->on('institutional_partners')
            ->onUpdate('cascade')
            ->onDelete('cascade');*/
        });

        // Pivot
        Schema::create('institutional_partner_transaction_program', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->unsignedInteger('transaction_program_id')->nullable(true);
            $table->string('institutional_partner_id', 50)->nullable(true);
            //$table->timestamps();

            $table->foreign('transaction_program_id', 'fk_transaction_program')->references('id')->on('transaction_programs')->onDelete('cascade');

            // Menentukan nama constraint secara manual
            $table->foreign('institutional_partner_id', 'fk_institutional_partner')->references('id')->on('institutional_partners')->onDelete('cascade');
        });

        DB::table('transaction_programs')->insert([
            [
                'id' => '1',
                'status' => 'completed',
                'activity' => '1. Satu',
                'objective' => 'Tujuan pertama',
                'output' => 'Output pertama',
                'target' => 'Sasaran pertama',
                'volume' => '1',
                'location' => 'Duren Sawit, Jakarta Timur',
                'schedule_activity' => '2024-11-01T02:02',
                'principal_program_id' => 'PPOK-001',
                'information' => 'belum_terlaksana',
                'created_at' => '2024-01-01T02:02',
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'status' => 'completed',
                'activity' => '2. Satu',
                'objective' => 'Tujuan kedua',
                'output' => 'Output kedua',
                'target' => 'Sasaran kedua',
                'volume' => '2',
                'location' => 'Kampung Melayu, Jakarta Timur',
                'schedule_activity' => '2024-11-06T02:02',
                'principal_program_id' => 'PPOK-002',
                'information' => 'terlaksana',
                'created_at' => '2024-01-02T02:02',
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'status' => 'completed',
                'activity' => '1.Satu 2.Dua 3.Tiga',
                'objective' => 'Tujuan ketiga',
                'output' => 'Output ketiga',
                'target' => 'Sasaran ketiga',
                'volume' => '3',
                'location' => 'Tebet, Jakarta Timur',
                'schedule_activity' => '2024-12-03T02:02',
                'principal_program_id' => 'PPOK-003',
                'information' => 'tidak_terlaksana',
                'created_at' => '2024-02-01T02:02',
                'updated_at' => now(),
            ],
            [
                'id' => '4',
                'status' => 'draft',
                'activity' => '',
                'objective' => 'Tujuan draft',
                'output' => 'Output draft',
                'target' => null,
                'volume' => '4',
                'location' => 'Jakarta Barat',
                'schedule_activity' => null,
                'principal_program_id' => 'PPOK-004',
                'information' => 'belum_terlaksana',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '5',
                'status' => 'draft',
                'activity' => null,
                'objective' => 'Tujuan draft kedua',
                'output' => 'Output draft kedua',
                'target' => null,
                'volume' => '5',
                'location' => 'Jakarta Utara',
                'schedule_activity' => null,
                'principal_program_id' => 'PPOK-005',
                'information' => 'terlaksana',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '6',
                'status' => 'draft',
                'activity' => null,
                'objective' => 'Tujuan draft kedua',
                'output' => 'Output draft kedua',
                'target' => null,
                'volume' => '6',
                'location' => 'Jakarta Selatan',
                'schedule_activity' => null,
                'principal_program_id' => 'PPOK-006',
                'information' => 'tidak_terlaksana',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '7',
                'status' => 'draft',
                'activity' => null,
                'objective' => 'Tujuan draft ketiga',
                'output' => 'Output draft ketiga',
                'target' => null,
                'volume' => '7',
                'location' => 'Jakarta Selatan',
                'schedule_activity' => null,
                'principal_program_id' => 'PPOK-007',
                'information' => 'belum_terlaksana',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '8',
                'status' => 'completed',
                'activity' => 'null',
                'objective' => 'Tujuan completed kedelapan',
                'output' => 'Output completed kedelapan',
                'target' => 'Tujuan completed kedelapan',
                'volume' => '7',
                'location' => 'Jakarta Selatan',
                'schedule_activity' => '2024-11-03T02:02',
                'principal_program_id' => 'PPOK-007',
                'information' => 'belum_terlaksana',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '9',
                'status' => 'completed',
                'activity' => 'Kegiatan ke 9',
                'objective' => 'Tujuan completed kesembilan',
                'output' => 'Output completed kesembilan',
                'target' => 'Tujuan completed kesembilan',
                'volume' => '7',
                'location' => 'Jakarta Barat',
                'schedule_activity' => '2024-11-03T02:02',
                'principal_program_id' => 'PPOK-007',
                'information' => 'belum_terlaksana',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ['id' => '10', 'status' => 'completed', 'activity' => '1. Kickoff Meeting', 'objective' => 'Menentukan langkah awal', 'output' => 'Rencana awal', 'target' => 'Tim proyek', 'volume' => '1', 'location' => 'Duren Sawit, Jakarta Timur', 'schedule_activity' => '2024-01-05T09:00', 'principal_program_id' => 'PPOK-001', 'information' => 'belum_terlaksana', 'created_at' => '2024-01-01T09:00', 'updated_at' => '2024-01-01T09:00'],
            ['id' => '11', 'status' => 'completed', 'activity' => '2. Workshop Teknis', 'objective' => 'Pelatihan teknis', 'output' => 'Peserta terlatih', 'target' => 'Tim teknis', 'volume' => '1', 'location' => 'Pulogadung, Jakarta Timur', 'schedule_activity' => '2024-01-20T10:00', 'principal_program_id' => 'PPOK-002', 'information' => 'tidak_terlaksana', 'created_at' => '2024-01-01T10:00', 'updated_at' => '2024-01-01T10:00'],

            ['id' => '12', 'status' => 'completed', 'activity' => '3. Survey Lokasi', 'objective' => 'Mengumpulkan data lapangan', 'output' => 'Laporan survey', 'target' => 'Tim survey', 'volume' => '1', 'location' => 'Matraman, Jakarta Timur', 'schedule_activity' => '2024-02-07T13:00', 'principal_program_id' => 'PPOK-003', 'information' => 'tidak_terlaksana', 'created_at' => '2024-02-01T13:00', 'updated_at' => '2024-02-01T13:00'],
            ['id' => '13', 'status' => 'completed', 'activity' => '4. Evaluasi Tahap 1', 'objective' => 'Evaluasi progres', 'output' => 'Laporan evaluasi', 'target' => 'Manajemen proyek', 'volume' => '1', 'location' => 'Cakung, Jakarta Timur', 'schedule_activity' => '2024-02-21T14:00', 'principal_program_id' => 'PPOK-004', 'information' => 'belum_terlaksana', 'created_at' => '2024-02-01T14:00', 'updated_at' => '2024-02-01T14:00'],

            ['id' => '14', 'status' => 'completed', 'activity' => '5. Rapat Koordinasi', 'objective' => 'Koordinasi tim', 'output' => 'Notulen rapat', 'target' => 'Semua anggota tim', 'volume' => '1', 'location' => 'Jatinegara, Jakarta Timur', 'schedule_activity' => '2024-03-08T11:00', 'principal_program_id' => 'PPOK-005', 'information' => 'terlaksana', 'created_at' => '2024-03-01T11:00', 'updated_at' => '2024-03-01T11:00'],
            ['id' => '15', 'status' => 'completed', 'activity' => '6. Penyusunan Dokumen', 'objective' => 'Menyusun dokumen proyek', 'output' => 'Dokumen lengkap', 'target' => 'Dokumentasi proyek', 'volume' => '1', 'location' => 'Cipayung, Jakarta Timur', 'schedule_activity' => '2024-03-22T15:00', 'principal_program_id' => 'PPOK-006', 'information' => 'belum_terlaksana', 'created_at' => '2024-03-01T15:00', 'updated_at' => '2024-03-01T15:00'],

            ['id' => '16', 'status' => 'completed', 'activity' => '7. Review Proyek', 'objective' => 'Menilai progres proyek', 'output' => 'Hasil review', 'target' => 'Tim review', 'volume' => '1', 'location' => 'Pasar Rebo, Jakarta Timur', 'schedule_activity' => '2024-04-09T16:00', 'principal_program_id' => 'PPOK-007', 'information' => 'terlaksana', 'created_at' => '2024-04-01T16:00', 'updated_at' => '2024-04-01T16:00'],
            ['id' => '17', 'status' => 'completed', 'activity' => '8. Diskusi Evaluasi', 'objective' => 'Diskusi hasil evaluasi', 'output' => 'Rekomendasi perbaikan', 'target' => 'Manajemen', 'volume' => '1', 'location' => 'Ciracas, Jakarta Timur', 'schedule_activity' => '2024-04-23T17:00', 'principal_program_id' => 'PPOK-008', 'information' => 'tidak_terlaksana', 'created_at' => '2024-04-01T17:00', 'updated_at' => '2024-04-01T17:00'],

            ['id' => '18', 'status' => 'completed', 'activity' => '9. Finalisasi Proyek', 'objective' => 'Menyelesaikan proyek', 'output' => 'Proyek selesai', 'target' => 'Tim proyek', 'volume' => '1', 'location' => 'Makassar, Jakarta Timur', 'schedule_activity' => '2024-05-06T08:00', 'principal_program_id' => 'PPOK-009', 'information' => 'belum_terlaksana', 'created_at' => '2024-05-01T08:00', 'updated_at' => '2024-05-01T08:00'],
            ['id' => '19', 'status' => 'completed', 'activity' => '10. Dokumentasi Akhir', 'objective' => 'Dokumentasi proyek', 'output' => 'Dokumentasi lengkap', 'target' => 'Arsip proyek', 'volume' => '1', 'location' => 'Rawamangun, Jakarta Timur', 'schedule_activity' => '2024-05-20T10:00', 'principal_program_id' => 'PPOK-010', 'information' => 'terlaksana', 'created_at' => '2024-05-01T10:00', 'updated_at' => '2024-05-01T10:00'],
            [
                'id'                    => '20',
                'status'                => 'completed',
                'activity'              => '11. Penyusunan Anggaran',
                'objective'             => 'Menyusun rencana anggaran',
                'output'                => 'Dokumen anggaran',
                'target'                => 'Tim keuangan',
                'volume'                => '1',
                'location'              => 'Cakung, Jakarta Timur',
                'schedule_activity'     => '2024-06-05T09:00',
                'principal_program_id'  => 'PPOK-009',
                'information'           => 'belum_terlaksana',
                'created_at'            => '2024-06-01T09:00',
                'updated_at'            => '2024-06-01T09:00',
            ],
            [
                'id'                    => '21',
                'status'                => 'completed',
                'activity'              => '12. Pelatihan SDM',
                'objective'             => 'Peningkatan kompetensi',
                'output'                => 'Peserta kompeten',
                'target'                => 'Tim operasional',
                'volume'                => '1',
                'location'              => 'Matraman, Jakarta Timur',
                'schedule_activity'     => '2024-06-20T10:00',
                'principal_program_id'  => 'PPOK-008',
                'information'           => 'terlaksana',
                'created_at'            => '2024-06-01T10:00',
                'updated_at'            => '2024-06-01T10:00',
            ],
            [
                'id'                    => '22',
                'status'                => 'completed',
                'activity'              => '13. Rapat Evaluasi',
                'objective'             => 'Evaluasi progres',
                'output'                => 'Laporan evaluasi',
                'target'                => 'Manajemen',
                'volume'                => '1',
                'location'              => 'Jatinegara, Jakarta Timur',
                'schedule_activity'     => '2024-08-07T11:00',
                'principal_program_id'  => 'PPOK-007',
                'information'           => 'tidak_terlaksana',
                'created_at'            => '2024-08-01T11:00',
                'updated_at'            => '2024-08-01T11:00',
            ],
            [
                'id'                    => '23',
                'status'                => 'completed',
                'activity'              => '14. Penyusunan Laporan',
                'objective'             => 'Menyusun laporan akhir',
                'output'                => 'Laporan lengkap',
                'target'                => 'Tim administrasi',
                'volume'                => '1',
                'location'              => 'Duren Sawit, Jakarta Timur',
                'schedule_activity'     => '2024-08-25T14:00',
                'principal_program_id'  => 'PPOK-006',
                'information'           => 'belum_terlaksana',
                'created_at'            => '2024-08-01T14:00',
                'updated_at'            => '2024-08-01T14:00',
            ],
            [
                'id'                    => '24',
                'status'                => 'completed',
                'activity'              => '15. Konsultasi Publik',
                'objective'             => 'Menyerap aspirasi publik',
                'output'                => 'Dokumen aspirasi',
                'target'                => 'Masyarakat',
                'volume'                => '1',
                'location'              => 'Pulogadung, Jakarta Timur',
                'schedule_activity'     => '2024-10-10T15:00',
                'principal_program_id'  => 'PPOK-005',
                'information'           => 'terlaksana',
                'created_at'            => '2024-10-01T15:00',
                'updated_at'            => '2024-10-01T15:00',
            ],
            [
                'id'                    => '25',
                'status'                => 'completed',
                'activity'              => '16. Monitoring Proyek',
                'objective'             => 'Memantau perkembangan',
                'output'                => 'Laporan monitoring',
                'target'                => 'Tim pengawas',
                'volume'                => '1',
                'location'              => 'Ciracas, Jakarta Timur',
                'schedule_activity'     => '2024-10-22T16:00',
                'principal_program_id'  => 'PPOK-004',
                'information'           => 'belum_terlaksana',
                'created_at'            => '2024-10-01T16:00',
                'updated_at'            => '2024-10-01T16:00',
            ],
            [
                'id'                    => '26',
                'status'                => 'completed',
                'activity'              => '17. Rapat Penutupan',
                'objective'             => 'Menutup proyek resmi',
                'output'                => 'Dokumen penutupan',
                'target'                => 'Tim proyek',
                'volume'                => '1',
                'location'              => 'Cipayung, Jakarta Timur',
                'schedule_activity'     => '2024-12-05T09:00',
                'principal_program_id'  => 'PPOK-003',
                'information'           => 'terlaksana',
                'created_at'            => '2024-12-01T09:00',
                'updated_at'            => '2024-12-01T09:00',
            ],
            [
                'id'                    => '27',
                'status'                => 'completed',
                'activity'              => '18. Dokumentasi Akhir',
                'objective'             => 'Melengkapi dokumentasi',
                'output'                => 'Dokumen final',
                'target'                => 'Arsip proyek',
                'volume'                => '1',
                'location'              => 'Pasar Rebo, Jakarta Timur',
                'schedule_activity'     => '2024-12-18T10:00',
                'principal_program_id'  => 'PPOK-002',
                'information'           => 'belum_terlaksana',
                'created_at'            => '2024-12-01T10:00',
                'updated_at'            => '2024-12-01T10:00',
            ],
            [
                'id'                    => '28',
                'status'                => 'completed',
                'activity'              => '19. Dokumentasi Awal',
                'objective'             => 'Melengkapi dokumentasi awal',
                'output'                => 'Dokumen final',
                'target'                => 'Arsip proyek',
                'volume'                => '1',
                'location'              => 'Pasar Kamis, Jakarta Timur',
                'schedule_activity'     => '2024-12-11T10:00',
                'principal_program_id'  => 'PPOK-002',
                'information'           => 'tidak_terlaksana',
                'created_at'            => '2024-12-01T10:00',
                'updated_at'            => '2024-12-01T10:00',
            ],
            [
                'id'                    => '29',
                'status'                => 'completed',
                'activity'              => '20. Dokumentasi Akhir',
                'objective'             => 'Melengkapi dokumentasi akhir',
                'output'                => 'Dokumen final',
                'target'                => 'Arsip proyek',
                'volume'                => '1',
                'location'              => 'Pasar Jumat, Jakarta Timur',
                'schedule_activity'     => '2024-12-14T10:00',
                'principal_program_id'  => 'PPOK-002',
                'information'           => 'belum_terlaksana',
                'created_at'            => '2024-12-01T10:00',
                'updated_at'            => '2024-12-01T10:00',
            ],
        ]);

        DB::table('institutional_partner_transaction_program')->insert([
            [
                'id' => '1',
                'transaction_program_id' => '1',
                'institutional_partner_id' => 'MITRA-001',
            ],
            [
                'id' => '2',
                'transaction_program_id' => '2',
                'institutional_partner_id' => 'MITRA-001',
            ],
            [
                'id' => '3',
                'transaction_program_id' => '2',
                'institutional_partner_id' => 'MITRA-002',
            ],
            [
                'id' => '4',
                'transaction_program_id' => '3',
                'institutional_partner_id' => 'MITRA-001',
            ],
            [
                'id' => '5',
                'transaction_program_id' => '3',
                'institutional_partner_id' => 'MITRA-002',
            ],
            [
                'id' => '6',
                'transaction_program_id' => '3',
                'institutional_partner_id' => 'MITRA-003',
            ],
            [
                'id' => '7',
                'transaction_program_id' => '7',
                'institutional_partner_id' => 'MITRA-003',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_programs');
        Schema::dropIfExists('institutional_partner_transaction_program');
    }
};
