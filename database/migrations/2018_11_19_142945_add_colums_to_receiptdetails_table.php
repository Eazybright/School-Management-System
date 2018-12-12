<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToReceiptdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receiptdetails', function (Blueprint $table) {
            $table->foreign('receipt_id')->references('id')->on('receipts');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('transaction_id')->references('id')->on('transactions'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receiptdetails', function (Blueprint $table) {
            $table->dropForeign(['receipts_receipt_id_foreign', 'students_student_id_foreign', 'transactions_transaction_id_foreign']);
            $table->dropColumn(['receipt_id', 'student_id', 'transaction_id']);
        });
    }
}
