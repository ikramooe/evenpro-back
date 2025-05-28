<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('event_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['welcome', 'media', 'registration', 'exhibitors']);
            $table->json('content')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            
            // Each event can only have one page of each type
            $table->unique(['event_id', 'type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_pages');
    }
};
