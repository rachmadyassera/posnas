<?php

use App\Models\Location;
use App\Models\Organization;
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
        Schema::create('confrences', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdfor(User::class);
            $table->foreignIdfor(Organization::class);
            $table->foreignIdfor(Location::class);
            $table->string('title');
            $table->longText('description')->nullable();
            $table->dateTime('date_confrence');
            $table->enum('status', ['enable', 'disable'])->default('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confrences');
    }
};
