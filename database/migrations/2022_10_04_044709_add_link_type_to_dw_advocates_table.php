<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkTypeToDwAdvocatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('dw_advocate', 'link_type')) {
            Schema::table('dw_advocate', function (Blueprint $table) {
                $table->enum('link_type', ['droplet', 'droplet-name', 'droplet-logo'])->default("droplet-name")->after('adv_email');
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
        if (Schema::hasColumn('dw_advocate', 'link_type')) {
            Schema::table('dw_advocate', function (Blueprint $table) {
                $table->dropColumn('link_type');
            });
        }
    }
}