<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->string('nisn')->default('text');
            $table->string('nis')->default('text');
            $table->string('nik')->default('text');
            $table->string('nama')->default('text');
            $table->string('alamat')->default('text');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->date('tanggal_lahir');
            $table->string('orang_tua')->default('text');
            $table->string('nohp_ortu', 15)->nullable()->default('text');
            $table->enum('jurusam', ['RPL', 'Perhotelan']);
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('siswas');
    }
};
