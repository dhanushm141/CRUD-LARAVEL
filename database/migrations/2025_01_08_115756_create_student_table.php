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
        Schema::create('studentdetails', function (Blueprint $table) {
               $table->increments('id')->primary();
               $table->string('name',30);
               $table->string('email',30)->unique();
               $table->bigInteger('mobile');
               $table->string('birthdate');
               $table->string('username');
               $table->string('password');
               $table->string('gender');
              $table->string('country', 100)->nullable()->default('text');
               $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentdetails');
    }
};
