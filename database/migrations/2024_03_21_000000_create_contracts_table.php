<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Schema::create('contracts', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('number')->unique();
        //     $table->date('date');
        //     $table->decimal('value', 10, 2);
        //     $table->enum('status', ['active', 'pending', 'cancelled'])->default('pending');
        //     $table->foreignId('customer_id')->constrained()->onDelete('cascade');
        //     $table->timestamps();
        // });
    }

    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}; 