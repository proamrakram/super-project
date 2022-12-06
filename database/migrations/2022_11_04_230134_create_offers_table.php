<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->foreignId('neighborhood_id')->constrained('neighborhoods')->cascadeOnDelete();
            $table->foreignId('offer_type_id')->constrained('offer_types')->cascadeOnDelete();
            $table->foreignId('property_type_id')->constrained('property_types')->cascadeOnDelete();
            $table->integer('property_id');
            $table->foreignId('property_status_id')->constrained('property_statuses')->cascadeOnDelete();
            $table->foreignId('price_type_id')->constrained('price_types')->cascadeOnDelete();
            $table->foreignId('street_id')->constrained('streets')->cascadeOnDelete();
            $table->foreignId('direction_id')->constrained('directions')->cascadeOnDelete();
            $table->foreignId('land_type_id')->constrained('land_types')->cascadeOnDelete();
            $table->foreignId('branch_id')->constrained('branches')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            #Fields
            $table->integer('who_edit')->default(null);
            $table->integer('who_cancel')->default(null);
            $table->unsignedBigInteger('land_number');
            $table->unsignedBigInteger('block_number');
            $table->json('mediators_ids');
            $table->json('booking_ids');
            $table->double('full_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
