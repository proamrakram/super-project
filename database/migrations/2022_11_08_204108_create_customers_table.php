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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('name'); #name
            $table->string('phone'); #phone
            $table->string('email')->nullable();
            $table->string('employer_id')->nullable(); #employee name
            $table->string('employer_name')->nullable(); #employee name
            $table->unsignedBigInteger('nationality_id')->nullable(); #nationality id
            $table->bigInteger('NID')->nullable(); #NID
            $table->integer('city_id')->nullable();
            $table->unsignedBigInteger('building_number')->nullable();
            $table->string('street_name')->nullable();
            $table->string('neighborhood_name')->nullable();
            $table->integer('zip_code')->nullable();
            $table->integer('addtional_number')->nullable();
            $table->integer('unit_number')->nullable();
            $table->boolean('support_eskan')->nullable();
            $table->boolean('is_buy')->nullable();
            $table->enum('employee_type', ['public', 'private'])->nullable();

            $table->enum('status', [1, 2])->nullable()->default(1);


            $table->integer('who_add')->nullable();
            $table->integer('who_edit')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
