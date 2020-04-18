<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRequestsAddColumnRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->string('room')->unique()->default(md5(rand()));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn('room');
        });
    }
}
