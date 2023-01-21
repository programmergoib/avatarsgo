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
            $table->string("nis", 9)->primary();
            $table->string("nama", 100);
            $table->string("jk", 1);
            $table->text("alamat");
            $table->integer("kode_rombel");
            $table->string("email");
            $table->date("tanggal_lahir");
            $table->year("tahun_masuk");
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
