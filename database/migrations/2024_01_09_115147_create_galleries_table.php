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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text_message');
            $table->timestamps();
            $table->foreignId('user_create_id')->nullable()->constrained('users');
            $table->foreignId('user_edit_id')->nullable()->constrained('users');
            $table->foreignId('user_delete_id')->nullable()->constrained('users');
            $table->softDeletes();
            $table->foreignId('user_publish_id')->nullable()->constrained('users');
            $table->dateTime('published_at')->nullable();
            $table->foreignId('user_archive_id')->nullable()->constrained('users');
            $table->dateTime('archived_at')->nullable();
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
        Schema::dropIfExists('galleries');
    }
};
