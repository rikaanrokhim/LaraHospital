<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->text('address');
            $table->string('diagnosis');
            $table->datetime('sign_in_at');
            $table->unsignedInteger('room_id');
            $table->integer('stock');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->integer('age');
            $table->enum('type', ['Rawat Inap', 'Rawat Jalan', 'BPJS Inap', 'BPJS Jalan']);
            $table->integer('treatment')->nullable()->default(null); //hari
            $table->integer('ransom')->nullable()->default(null); //tebusan
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
        Schema::dropIfExists('patients');
    }
}
