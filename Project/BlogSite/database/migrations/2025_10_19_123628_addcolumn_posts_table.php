<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('deleted_by')->nullable()->after('user_id'); // nullable
            $table->foreign('deleted_by')->references('id')->on('users');

            $table->timestamp('deleted_at')->nullable()->after('deleted_by');
        });

    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['deleted_by']);
            $table->dropColumn('deleted_by');
            $table->dropColumn('deleted_at');
        });
    }
};
