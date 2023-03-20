<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('nama');
            $table->string('kelas');
            // $table->string('barcode');
            $table->text('foto_barcode')->nullable();
            $table->text('tiket')->nullable();
            // $table->foreignId('kelas_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('pendamping')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
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
}
