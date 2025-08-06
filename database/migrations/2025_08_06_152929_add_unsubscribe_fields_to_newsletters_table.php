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
            $table->boolean('is_active')->default(true)->after('email');
            $table->timestamp('unsubscribed_at')->nullable()->after('subscribed_at');
            $table->string('unsubscribe_token')->unique()->nullable()->after('unsubscribed_at');
            $table->text('unsubscribe_reason')->nullable()->after('unsubscribe_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newsletters', function (Blueprint $table) {
            $table->dropColumn(['is_active', 'unsubscribed_at', 'unsubscribe_token', 'unsubscribe_reason']);
        });
    }
};
