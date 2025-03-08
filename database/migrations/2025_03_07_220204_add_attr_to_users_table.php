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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->after('email');
            $table->string('identity',11)->nullable()->after('phone');
            $table->string('trade_registry')->nullable()->after('identity');
            $table->integer('tax_no')->nullable()->after('trade_registry');
            $table->integer('tax_identity_no')->nullable()->after('tax_no');
            $table->text('address')->nullable()->after('tax_identity_no');
            $table->string('company_name')->nullable()->after('address');
            $table->enum('type', ['ADMIN', 'COMPANY', 'CUSTOMER'])->default('CUSTOMER')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'identity', 'address', 'trade_registry', 'tax_no', 'tax_identity_no', 'company_name', 'type']);
        });
    }
};
