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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->enum('for', ['company', 'customer'])->default('customer');
            $table->string('domain')->unique();
            $table->string('customer');
            $table->string('mobile');
            $table->string('project');
            $table->integer('renewal_amount')->default(0);
            $table->timestamp('purchase_date')->nullable();
            $table->timestamp('renewal_date')->nullable();
            $table->string('status')->default('active');
            $table->boolean('hidden')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
