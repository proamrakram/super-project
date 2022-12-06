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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id()->startingValue(100);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->string('customer_name');
            $table->double('price')->default(0.0);
            $table->enum('status', [1, 2]);
            $table->date('date_from');
            $table->date('date_to');
            $table->text('note');
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
        Schema::dropIfExists('reservations');
    }
};
