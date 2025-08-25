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
        Schema::table('history_log_activitys', function (Blueprint $table) {
            //
            $table->unique(['id','activity_id'],'history_log_activitys_id_activityid_unique');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('history_log_activitys', function (Blueprint $table) {
            //
            $table->dropUnique('history_log_activitys_id_activityid_unique');

        });
    }
};
