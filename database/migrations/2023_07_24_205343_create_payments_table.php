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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string("payment_method")->nullable();
            // fk customer
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            // fk order
            $table->foreignId("order_id")->constrained("orders")->onDelete("cascade")->onUpdate("cascade");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
