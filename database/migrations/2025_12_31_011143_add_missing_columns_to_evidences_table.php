<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public $withinTransaction = false;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('evidences', function (Blueprint $table) {
            // Tambahkan kolom po_id (purchase order)
            if (!Schema::hasColumn('evidences', 'po_id')) {
                $table->unsignedBigInteger('po_id')->nullable()->after('user_id');
            }

            // Tambahkan kolom tematik_id jika belum ada
            if (!Schema::hasColumn('evidences', 'tematik_id')) {
                $table->unsignedBigInteger('tematik_id')->nullable()->after('po_id');
            }

            // Tambahkan kolom pangwas_id jika belum ada
            if (!Schema::hasColumn('evidences', 'pangwas_id')) {
                $table->unsignedBigInteger('pangwas_id')->nullable()->after('tematik_id');
            }

            // Tambahkan kolom project_id jika belum ada
            if (!Schema::hasColumn('evidences', 'project_id')) {
                $table->integer('project_id')->nullable()->after('pangwas_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evidences', function (Blueprint $table) {
            $table->dropColumn(['po_id', 'tematik_id', 'pangwas_id', 'project_id']);
        });
    }
};
