<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            // campo quem criou
            $table->foreignId('created_by')
                ->after('id')
                ->constrained('users')
                ->cascadeOnDelete();
            // campo quem modificou por último
            $table->foreignId('updated_by')
                ->after('created_by')
                ->constrained('users')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['updated_by']);
            $table->dropColumn('updated_by');
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });
    }
};
