<?php

use App\Models\Confrence;
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
        Schema::create('presence', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdfor(Confrence::class);
            $table->string('name');
            $table->string('organization');
            $table->string('position');
            $table->string('id_employee');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('nohp');
            $table->longText('signature');
            $table->enum('status', ['enable', 'disable'])->default('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presence');
    }
};
