<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoLinkToDwAdvocatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('dw_advocate', 'logo_url')) {
            Schema::table('dw_advocate', function (Blueprint $table) {
                $table->string('logo_url')->nullable()->after('link_type');
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
        if (Schema::hasColumn('dw_advocate', 'logo_url')) {
            Schema::table('dw_advocate', function (Blueprint $table) {
                $table->dropColumn('logo_url');
            });
        }
    }
}