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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')
            ->on('sub_categories')->onDelete('cascade');

            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')
            ->on('brands')->onDelete('SET NULL');

            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('sale_percent');
            $table->string('image');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('trending')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
