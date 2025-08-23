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
        Schema::table('activitys', function (Blueprint $table) {
           // Menambahkan composite index pada kolom user_id dan status dengan nama khusus
            $table->index(['created_at','date_activity','status'],'activitys_status_dateactivity_createdate_index');
            $table->unique(['id','user_id', 'organization_id'],'activitys_id_userid_organizationid_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activitys', function (Blueprint $table) {
        // Menghapus composite index menggunakan nama index khusus
        $table->dropIndex('activitys_status_dateactivity_createdate_index');
        $table->dropUnique('activitys_id_userid_organizationid_unique');
            //
        });
    }
};
