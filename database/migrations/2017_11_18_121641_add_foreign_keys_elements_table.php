<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'elements',
            function (Blueprint $table) {
                $table->foreign('page_id')
                    ->references('id')
                    ->on('pages')
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
            'elements',
            function (Blueprint $table) {
                $table->dropForeign('elements_page_id_foreign');
            }
        );
    }
}
