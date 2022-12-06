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
        Schema::create('permissions', function (Blueprint $table) {
            # Value (1) == (active)
            # Value (2) == (inactive)
            $table->id();

            #related tables
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            #permissions offers
            $table->enum('manage_mediators', [1, 2]);

            #permissions offers
            $table->enum('can_add_offers', [1, 2]);
            $table->enum('can_edit_offers', [1, 2]);
            $table->enum('can_show_offers', [1, 2]);
            $table->enum('can_delete_offers', [1, 2]);
            $table->enum('can_cancel_offers', [1, 2]);

            #permissions orders
            $table->enum('can_add_orders', [1, 2]);
            $table->enum('can_edit_orders', [1, 2]);
            $table->enum('can_show_orders', [1, 2]);
            $table->enum('can_delete_orders', [1, 2]);
            $table->enum('can_cancel_orders', [1, 2]);

            #permissions receipt voucher
            $table->enum('can_add_vouchers', [1, 2]);
            $table->enum('can_edit_vouchers', [1, 2]);
            $table->enum('can_show_vouchers', [1, 2]);
            $table->enum('can_delete_vouchers', [1, 2]);
            $table->enum('can_cancel_vouchers', [1, 2]);

            #permissions sells
            $table->enum('can_add_sells', [1, 2]);
            $table->enum('can_edit_sells', [1, 2]);
            $table->enum('can_show_sells', [1, 2]);
            $table->enum('can_delete_sells', [1, 2]);
            $table->enum('can_cancel_sells', [1, 2]);

            $table->enum('can_booking', [1, 2]);
            // $table->enum('can_send_sms', [1, 2]);

            $table->enum('can_send_sms_collection', [1, 2]);
            $table->enum('can_send_sms_individually', [1, 2]);

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
        Schema::dropIfExists('permissions');
    }
};
