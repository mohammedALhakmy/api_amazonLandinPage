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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('about_us')->nullable();
            $table->text('why_us')->nullable();
            $table->text('goal')->nullable();
            $table->text('vision')->nullable();
            $table->text('about_footer')->nullable();
            $table->text('ads_text')->nullable();
            $table->text('activities_text')->nullable();
            $table->text('persons_text')->nullable();
            $table->text('contact_us_text')->nullable();
            $table->text('terms_text')->nullable();
            $table->text('activity_terms')->nullable();
            $table->string('counter1_name')->nullable();
            $table->integer('counter1_count')->nullable();
            $table->string('counter2_name')->nullable();
            $table->integer('counter2_count')->nullable();
            $table->string('counter3_name')->nullable();
            $table->integer('counter3_count')->nullable();
            $table->string('counter4_name')->nullable();
            $table->integer('counter4_count')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('whatsapp1')->nullable();
            $table->string('whatsapp2')->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('pinterest')->nullable();
            $table->text('map')->nullable();
            $table->string('google_play')->nullable();
            $table->string('app_store')->nullable();
            $table->string('ad_link_1')->nullable();
            $table->string('ad_link_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
