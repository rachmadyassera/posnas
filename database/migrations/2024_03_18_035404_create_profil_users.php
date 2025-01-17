<?php

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
        Schema::create('profil_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdfor(User::class);
            $table->foreignIdfor(Organization::class);
            $table->string('nip');
            $table->string('jabatan');
            $table->string('nohp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_users');
    }
};
