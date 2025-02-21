<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('product_carts', function (Blueprint $table) {
            $table->string('user_token')->nullable()->after('price');
        });
    }

    public function down()
    {
        Schema::table('product_carts', function (Blueprint $table) {
            $table->dropColumn('user_token');
        });
    }
};
