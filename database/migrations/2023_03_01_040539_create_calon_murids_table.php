<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_murids', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('umur');
            $table->string('nama_orang_tua');
            $table->string('pendidikan');
            $table->string('umum');
            $table->string('agama');
            $table->string('no_hp');
            $table->string('status_pendaftaran');
            $table->string('geup');
            $table->string('kabupaten_kota');
            $table->string('kacamatan');
            $table->foreignId('dojang_id')->constrained('dojengs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('calon_murids');
    }
}
