<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE invoices MODIFY COLUMN status ENUM('paid','partial','unpaid','sent') DEFAULT 'unpaid'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE invoices MODIFY COLUMN status ENUM('paid','partial','unpaid') DEFAULT 'unpaid'");
    }
};
