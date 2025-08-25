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
        Schema::table('documentation_activitys', function (Blueprint $table) {
            //
            $table->unique(['id','notesactivity_id','user_id'],'documentation_activitys_id_notesactivityid_userid_unique');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documentation_activitys', function (Blueprint $table) {
            //
            $table->dropUnique('documentation_activitys_id_notesactivityid_userid_unique');

        });
    }
};
