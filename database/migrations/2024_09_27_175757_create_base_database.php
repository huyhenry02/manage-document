<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('content', 255);
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->enum('status', ['pending', 'approve', 'reject'])->default('pending');
            $table->dateTime('approved_at')->nullable();
            $table->string('reject_reason', 255)->nullable();
            $table->string('note', 255)->nullable();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('created_by_id')->unsigned();
            $table->bigInteger('update_status_by_id')->unsigned()->nullable();
            $table->bigInteger('updated_by_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->bigInteger('created_by_id')->unsigned();
            $table->bigInteger('updated_by_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('model_id')->unsigned();
            $table->string('model_type');
            $table->string('file_path');
            $table->string('file_name');
            $table->bigInteger('file_size')->unsigned();
            $table->string('mime_type');
            $table->bigInteger('uploaded_by_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('documents', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('update_status_by_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by_id')->references('id')->on('users')->onDelete('set null');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('users')->onDelete('set null');
        });
        Schema::table('files', function (Blueprint $table) {
            $table->foreign('uploaded_by_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('files');
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['created_by_id']);
            $table->dropForeign(['update_status_by_id']);
            $table->dropForeign(['updated_by_id']);
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropForeign(['created_by_id']);
            $table->dropForeign(['updated_by_id']);
        });
        Schema::table('files', function (Blueprint $table) {
            $table->dropForeign(['uploaded_by_id']);
        });
    }
};
