<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->double('price', 6, 2);
            $table->integer('quantity');
            $table->bigInteger('Cat_id')->unsigned();
            $table->foreign('Cat_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('status')->default('0')->comment('0=not active,1=active');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
