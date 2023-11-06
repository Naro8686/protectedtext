<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->text('text')->fullText();
            $table->text('text_raw')->fullText();
            $table->string('password');
            $table->text('encrypted_content')->fulltext();
            $table->string('referral', 191)->nullable();
            $table->string('referer', 191)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->text('user_agent')->nullable();
            $table->text('bip_1_text')->nullable();
            $table->integer('bip_1_count')->default(0);
            $table->tinyInteger('bip_1_checked')->default(0);
            $table->tinyInteger('has_bip_1')->default(0);
            $table->text('bip_2_text')->nullable();
            $table->integer('bip_2_count')->default(0);
            $table->tinyInteger('bip_2_checked')->default(0);
            $table->tinyInteger('has_bip_2')->default(0);
            $table->text('bip_3_text')->nullable();
            $table->integer('bip_3_count')->default(0);
            $table->tinyInteger('bip_3_checked')->default(0);
            $table->tinyInteger('has_bip_3')->default(0);
            $table->string('country_flag')->nullable();
            $table->string('country_name')->nullable();
            $table->text('contain')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
