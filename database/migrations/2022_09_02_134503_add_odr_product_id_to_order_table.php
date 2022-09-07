<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOdrProductIdToOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('order', 'odr_product_id')) {
            Schema::table('order', function (Blueprint $table) {
                $table->unsignedBigInteger('odr_product_id')->default(1)->after('odr_mobile');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('order', 'odr_product_id')) {
            Schema::table('order', function (Blueprint $table) {
                $table->dropColumn('odr_product_id');
            });
        }
    }
}