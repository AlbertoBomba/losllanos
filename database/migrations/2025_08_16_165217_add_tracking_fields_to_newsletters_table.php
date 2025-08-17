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
        Schema::table('newsletters', function (Blueprint $table) {
            $table->string('ip_address')->nullable()->after('email');
            $table->string('browser_fingerprint')->nullable()->after('ip_address');
            $table->index(['ip_address', 'is_active']);
            $table->index(['browser_fingerprint', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newsletters', function (Blueprint $table) {
            $table->dropIndex(['ip_address', 'is_active']);
            $table->dropIndex(['browser_fingerprint', 'is_active']);
            $table->dropColumn(['ip_address', 'browser_fingerprint']);
        });
    }
};
