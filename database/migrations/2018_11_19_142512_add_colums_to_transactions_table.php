<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            
            $table->foreign('fee_id')->references('id')->on('fees');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('student_fee_id')->references('id')->on('studentfees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['fees_fee_id_foreign', 'users_user_id_foreign', 
                'students_student_id_foreign', 'studentfees_student_fee_id_foreign']);
            $table->dropColumn(['fee_id', 'student_fee_id', 'student_id', 'user_id']);
        });
    }
}
