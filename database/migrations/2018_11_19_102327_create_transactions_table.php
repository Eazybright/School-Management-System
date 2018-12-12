<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('transaction_date');
            $table->integer('fee_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('student_fee_id')->unsigned();
            $table->float('paid', 8, 2);
            $table->string('remark', 50)->nullable();
            $table->string('description', 200)->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
