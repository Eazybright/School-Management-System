<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('academic_id')->references('id')->on('academics');
            $table->foreign('shift_id')->references('id')->on('shifts');
            $table->foreign('time_id')->references('id')->on('times');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('batch_id')->references('id')->on('batches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->dropForeign(['levels_level_id_foreign', 'academics_academic_id_foreign', 'shifts_shift_id_foreign', 
                'times_time_id_foreign', 'groups_group_id_foreign', 'batches_batch_id_foreign']);
            $table->dropColumn(['level_id', 'academic_id', 'shift_id', 'time_id', 'group_id', 'batch_id']);
        });
    }
}
