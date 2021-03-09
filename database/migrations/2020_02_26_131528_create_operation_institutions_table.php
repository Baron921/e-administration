<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_institutions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('operation_id');
            $table->foreign('operation_id')
                ->references('id')
                ->on('operations')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('institution_id');
            $table->foreign('institution_id')
                ->references('id')
                ->on('institutions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operation_institutions');
    }
}
