<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE applications MODIFY status ENUM('pending', 'accepted', 'rejected', 'confirmed') DEFAULT 'pending'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE applications MODIFY status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending'");
    }
};
