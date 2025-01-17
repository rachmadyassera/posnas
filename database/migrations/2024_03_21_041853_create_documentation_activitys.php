<?php

use App\Models\Notesactivity;
use App\Models\User;
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
        Schema::create('documentation_activitys', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdfor(Notesactivity::class);
            $table->foreignIdfor(User::class);
            $table->string('picture');
            $table->enum('status', ['enable', 'disable'])->default('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentation_activitys');
    }
};
