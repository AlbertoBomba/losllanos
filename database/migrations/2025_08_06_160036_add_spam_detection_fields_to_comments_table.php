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
        Schema::table('comments', function (Blueprint $table) {
            // Add spam detection fields if they don't exist
            if (!Schema::hasColumn('comments', 'ip_address')) {
                $table->string('ip_address')->nullable()->after('content');
            }
            if (!Schema::hasColumn('comments', 'user_agent')) {
                $table->text('user_agent')->nullable()->after('ip_address');
            }
            if (!Schema::hasColumn('comments', 'spam_score')) {
                $table->integer('spam_score')->default(0)->after('is_spam');
            }
            if (!Schema::hasColumn('comments', 'spam_reasons')) {
                $table->json('spam_reasons')->nullable()->after('spam_score');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn(['spam_score', 'spam_reasons']);
            // Note: We don't drop ip_address and user_agent as they might be needed for other purposes
        });
    }
};
