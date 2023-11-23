<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('customer_name')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('cart_id')->nullable();

            $table->decimal('total_price', 10, 2)->nullable();
            $table->decimal('discounted_price', 10, 2)->nullable();

            $table->enum('shipment_status', ['new', 'packed', 'shipped', 'delivered', 'returned']);
            $table->string('return_reason')->nullable();

            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->toArray();

            $table->enum('payment_method', ['cash_on_delivery', 'card'])->nullable();
            $table->enum('payment_status', ['paid', 'not_paid'])->default('not_paid');

            $table->string('ordered_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
