<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKategoriIdToProduks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::table('produks', function (Blueprint $table) {
            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->nullable()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::disableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn('kategori_id');
        });
        Schema::disableForeignKeyConstraints();
    }
}
