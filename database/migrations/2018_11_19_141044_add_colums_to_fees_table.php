<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fees', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('academic_id')->references('id')->on('academics');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('fee_type_id')->references('id')->on('feetypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fees', function (Blueprint $table) {
            $table->dropForeign(['levels_level_id_foreign', 'academics_academic_id_foreign', 
                'students_student_id_foreign', 'feetypes_fee_type_id_foreign']);
            $table->dropColumn(['level_id', 'academic_id', 'student_id', 'fee_type_id']);
        });
    }
}
