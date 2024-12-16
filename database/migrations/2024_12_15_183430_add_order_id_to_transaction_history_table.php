<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderIdToTransactionHistoryTable extends Migration
{
    public function up()
    {
        Schema::table('transaction_history', function (Blueprint $table) {
            $table->string('order_id')->nullable()->after('snap_token');
        });
    }

    public function down()
    {
        Schema::table('transaction_history', function (Blueprint $table) {
            $table->dropColumn('order_id');
        });
    }
}
