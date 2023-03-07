<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('plats', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->integer("prix");

            $table->unsignedBigInteger('origin_id');
            $table->foreign('origin_id')
                ->references('id')
                ->on('origins')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('type_plat_id');
            $table->foreign('type_plat_id')
                ->references('id')
                ->on('type_plats')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->unsignedBigInteger('nature_id');
            $table->foreign('nature_id')
                ->references('id')
                ->on('natures')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        }); 
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit');
    }
};
