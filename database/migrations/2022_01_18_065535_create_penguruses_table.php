<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('penguruses', function (Blueprint $table) {
      $table->id();
      $table->foreignId('jabatan_id')->constrained('jabatans', 'id');
      $table->char('regencie_id');

      $table->foreign('regencie_id')
        ->references('id')
        ->on('regencies');

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
    Schema::dropIfExists('penguruses');
  }
}
