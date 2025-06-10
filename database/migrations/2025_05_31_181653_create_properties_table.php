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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 12, 2);
            //Details
            $table->float('area');
            $table->integer('age')->default(1);
            $table->integer('street_width')->nullable();
            $table->integer('bathrooms');
            $table->integer('floors')->nullable();
            $table->boolean('furnished')->default(false);
            $table->integer('halls')->default(1);
            $table->integer('apartments')->default(1);
            $table->integer('bedrooms');
            $table->string('purpose');
            $table->string('rent_type')->nullable();
            $table->unsignedBigInteger('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('user_id')->references('id')->on('users');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            $table->timestamps();
        });
        Schema::create('property_translation', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('locale');
            $table->unsignedBigInteger('property_id')->references('id')->on('properties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
        Schema::dropIfExists('property_translation');
    }
};
