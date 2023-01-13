<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsCollabToDwAdvocatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('dw_advocate', 'is_collab')) {
            Schema::table('dw_advocate', function (Blueprint $table) {
                $table->boolean('is_collab')->default(0)->after('adv_detail_access_token');
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
        if (Schema::hasColumn('dw_advocate', 'is_collab')) {
            Schema::table('dw_advocate', function (Blueprint $table) {
                $table->dropColumn('is_collab');
            });
        }
    }
}