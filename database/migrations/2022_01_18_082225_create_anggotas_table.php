<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('anggotas', function (Blueprint $table) {
      $table->id();
      $table->string('nama');
      $table->text('alamat');
      $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
      $table->string('telp');
      $table->string('photo');
      $table->year('tahun_terdaftar');
      // $table->char('regencie_id');

      $table->foreignId('pengurus_id')->constrained('penguruses', 'id');
      $table->foreignId('sabuk_id')->constrained('sabuks', 'id');
      $table->foreignId('dojeng_id')->constrained('dojengs', 'id');
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
    Schema::dropIfExists('anggotas');
  }
}
