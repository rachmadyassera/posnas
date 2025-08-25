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
        Schema::table('notes_activitys', function (Blueprint $table) {
            //
            $table->unique(['id','activity_id','user_id'],'notes_activitys_id_activityid_userid_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notes_activitys', function (Blueprint $table) {
            //
            $table->dropUnique('notes_activitys_id_activityid_userid_unique');

        });
    }
};
