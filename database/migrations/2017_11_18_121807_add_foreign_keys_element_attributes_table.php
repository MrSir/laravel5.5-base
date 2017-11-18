<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysElementAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'element_attributes',
            function (Blueprint $table) {
                $table->foreign('element_id')
                    ->references('id')
                    ->on('elements')
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
            'element_attributes',
            function (Blueprint $table) {
                $table->dropForeign('element_attributes_element_id_foreign');
            }
        );
    }
}
