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
    Schema::create('contracts', function (Blueprint $table) {
        $table->id();
        // esta linha é crucial:
        $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
        $table->decimal('amount', 12, 2);
        $table->date('start_date');
        $table->date('end_date');
        $table->string('status')->default('ativo');
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
