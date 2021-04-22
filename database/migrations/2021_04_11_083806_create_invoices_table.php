<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('total_price')->nullable();
            $table->string('address');
            $table->string('tel')->nullable();
            $table->string('notes')->nullable();
            $table->dateTime('created_dateTime');
            $table->dateTime('completed_time')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
