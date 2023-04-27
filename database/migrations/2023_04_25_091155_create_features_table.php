<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('features', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->unsignedBigInteger('package_id');
        $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};