<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTasksTableAddPingUrlFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(config('totem.table_prefix').'tasks', function (Blueprint $table) {
            $table->string('ping_url_before')->nullable();
            $table->string('ping_url_after')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(config('totem.table_prefix').'tasks', function (Blueprint $table) {
            $table->dropColumn('ping_url_before');
            $table->dropColumn('ping_url_after');
        });
    }
}
