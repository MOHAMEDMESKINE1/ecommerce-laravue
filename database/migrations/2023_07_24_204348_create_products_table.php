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
            $table->string("name")->nullable();
            $table->text("description")->nullable();
            $table->text("photo")->nullable();
            $table->integer("price")->nullable()->default(100);
            $table->integer("old_price")->nullable()->default(200);
            $table->integer("quantity")->nullable()->default(1);
            $table->string("size")->nullable();
            $table->string("color")->nullable();

            // fk category
            $table->foreignId("category_id")->constrained("categories")->onDelete("cascade")->onUpdate("cascade");
           
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
