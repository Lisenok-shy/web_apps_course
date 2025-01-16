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
       
         // Таблица  House
         Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->float('area');
            $table->float('price');
            $table->timestamps();
        });
          // Таблица  Contract
          Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('num');
            $table->timestamp('date_begin');
            $table->timestamp('date_end');
            $table->float('price');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('house_id');
            $table->boolean('confirmed')->nullable(false)->default(false);
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->foreign('house_id')->references('id')->on('houses');
            $table->timestamps();
        });
         //Таблица Bill
         Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->timestamp('payment_date');
            $table->float('amount');
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->timestamps();
        });
        // Таблица  Houseimg
        Schema::create('house_imgs', function (Blueprint $table) {
          $table->id();
          $table->string('img')->nullable();
          $table->unsignedBigInteger('house_id');
          $table->foreign('house_id')->references('id')->on('houses');
          $table->timestamps();
          $table->unique(['house_id','img']);
        });
        // Таблица  Categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->timestamps();
        });
         // Таблица  Categories
         Schema::create('category_house', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('house_id')->references('id')->on('houses');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
            $table->unique(['house_id','category_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_imgs');
        Schema::dropIfExists('bills');
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('category_house');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('houses');       
    }
};
