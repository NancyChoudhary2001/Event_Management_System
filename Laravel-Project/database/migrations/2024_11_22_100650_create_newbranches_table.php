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
    Schema::create('newbranches', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('address');
        $table->unsignedBigInteger('country_id');  
        $table->unsignedBigInteger('state_id');    
        $table->unsignedBigInteger('city_id');     
        $table->string('pincode');
        $table->timestamps();
        $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
        $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newbranches');
    }
};