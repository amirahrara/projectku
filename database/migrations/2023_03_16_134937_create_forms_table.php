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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id');
            $table->foreignId('user_id');
            $table->string('nomor_surat');
            $table->string('rincian');
            $table->string('tujuan');
            $table->string('memperoleh_informasi');
            $table->string('mendapat_salinan');
            $table->string('ttd');
            $table->string('petugas_penerima');
            $table->string('jabatan');
            $table->string('status');
            $table->string('alasan');
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
        Schema::dropIfExists('forms');
    }
};
