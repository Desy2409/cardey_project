<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_resumes', function (Blueprint $table) {
            $table->id();
            $table->text('home_first_title')->nullable();
            $table->text('home_second_title')->nullable();
            // $table->text('about');
            // $table->text('contact');
            $table->text('gallery')->nullable();
            $table->text('team')->nullable();
            $table->text('faq')->nullable();
            // $table->text('social');
            $table->timestamps();
            $table->foreignId('user_create_id')->nullable()->constrained('users');
            $table->foreignId('user_edit_id')->nullable()->constrained('users');
            $table->foreignId('user_delete_id')->nullable()->constrained('users');
            $table->softDeletes();
            $table->foreignId('user_restore_id')->nullable()->constrained('users');
            $table->dateTime('restored_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('section_resumes');
    }
};
