<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('jk_id')->unsigned()->index();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('status_id')->unsigned()->index();
            $table->date('in_date_at')->nullable();
            $table->date('out_date_at')->nullable();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('status_patients')->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('jk_id')->references('id')->on('jenis_kelamin_patients')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
