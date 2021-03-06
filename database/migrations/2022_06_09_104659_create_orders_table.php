<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sparepart_id');
            $table->string('status')->default('Pending');
            $table->timestamps();
            $table->integer('jumlah');
            $table->foreign('user_id')
            ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sparepart_id')
            ->references('id')->on('spareparts')->onDelete('cascade');
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
}
