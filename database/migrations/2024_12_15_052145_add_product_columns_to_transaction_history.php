<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductColumnsToTransactionHistory extends Migration
{
    public function up()
    {
        Schema::table('transaction_history', function (Blueprint $table) {
            $table->string('product_name')->nullable();  // Kolom untuk menyimpan nama produk
            $table->decimal('product_price', 10, 2)->nullable(); // Kolom untuk menyimpan harga produk
        });
    }

    public function down()
    {
        Schema::table('transaction_history', function (Blueprint $table) {
            $table->dropColumn(['product_name', 'product_price']);
        });
    }
}
