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
        Schema::create('subscribtion', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('subscribtion_amount');
            $table->date('subscribed_limitdate');
            $table->date('upgradeDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribtion');
    }
};
