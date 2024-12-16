<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTransactionHistoryTable extends Migration
{
    public function up()
    {
        Schema::table('transaction_history', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id'); // Tambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Tambahkan foreign key
        });
    }

    public function down()
    {
        Schema::table('transaction_history', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Hapus foreign key
            $table->dropColumn('user_id'); // Hapus kolom user_id
        });
    }
};
