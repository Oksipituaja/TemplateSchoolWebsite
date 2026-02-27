<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Populate event_time dengan 00:00:00 untuk semua records yang masih NULL
        DB::table('agendas')->whereNull('event_time')->update([
            'event_time' => '00:00:00',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Set event_time back to NULL
        DB::table('agendas')->update([
            'event_time' => null,
        ]);
    }
};
