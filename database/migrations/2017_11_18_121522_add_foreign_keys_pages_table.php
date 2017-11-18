<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'pages',
            function (Blueprint $table) {
                $table->foreign('site_id')
                    ->references('id')
                    ->on('sites')
                    ->onUpdate('RESTRICT')
                    ->onDelete('RESTRICT');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'pages',
            function (Blueprint $table) {
                $table->dropForeign('pages_site_id_foreign');
            }
        );
    }
}
