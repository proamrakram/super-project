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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique()->nullable();
            $table->foreignId('order_status_id')->constrained('order_statuses')->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->integer('offer_id')->nullable();

            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();

            $table->string('employer_name')->nullable();
            $table->enum('employee_type', ['public', 'private']);
            $table->boolean('support_eskan')->default(0);

            $table->integer('property_type_id');
            $table->integer('city_id');

            $table->double('area');
            $table->double('price_from');
            $table->double('price_to');
            $table->double('avaliable_amount');
            $table->integer('purch_method_id');
            $table->integer('desire_to_buy_id');

            $table->integer('assign_to')->nullable();
            $table->integer('branch_id');

            $table->text('notes')->nullable();

            $table->date('assign_to_date')->nullable(); # time of assign
            $table->date('closed_date')->nullable(); # time of close
            $table->integer('who_add')->nullable(); # id of creator
            $table->integer('who_edit')->nullable(); # id of editor
            $table->integer('who_cancel')->nullable(); # id of deleter
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
        Schema::dropIfExists('orders');
    }
};
