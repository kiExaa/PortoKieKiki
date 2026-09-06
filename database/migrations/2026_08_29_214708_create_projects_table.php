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
        Schema::create('projects', function (Blueprint $table) {
           $table->id();
$table->string('title');
$table->string('slug')->unique();
$table->string('type')->nullable();
$table->text('short_description')->nullable();
$table->text('description')->nullable();
$table->text('problem')->nullable();
$table->text('solution')->nullable();
$table->text('features')->nullable();
$table->text('role')->nullable();
$table->string('cover_image')->nullable();
$table->string('project_url')->nullable();
$table->string('github_url')->nullable();
$table->string('status')->default('draft');
$table->boolean('featured')->default(false);
$table->integer('sort_order')->default(0);
$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
