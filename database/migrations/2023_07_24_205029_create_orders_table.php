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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity")->nullable()->default(1);
            $table->integer("price")->nullable()->default(100);
            $table->integer("total")->nullable()->default(0);
            $table->integer("payment")->nullable();
            $table->integer("status")->nullable();


            // fk customer
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            // fk product
            $table->foreignId("product_id")->constrained("products")->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
