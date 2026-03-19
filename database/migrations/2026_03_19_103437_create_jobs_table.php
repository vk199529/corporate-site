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
        Schema::create('cric_jobs', function (Blueprint $table) {
            $table->id();
             $table->string('title'); // job title
            $table->longText('content'); // description

            $table->boolean('status')->default(0); // publish या नहीं
            $table->timestamp('published_at')->nullable();

            $table->string('slug')->unique();

            // SEO fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cric_jobs');
    }
};
