<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('transaction_history', function (Blueprint $table) {
        $table->string('status_pembayaran')->default('belum dibayar'); // menambahkan kolom status_pembayaran
    });
}

public function down()
{
    Schema::table('transaction_history', function (Blueprint $table) {
        $table->dropColumn('status_pembayaran');
    });
}
    
};
