<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('content');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_public')->default(false);
            $table->enum('status', ['Private', 'Pending', 'Public']);
            $table->string('note', 255)->nullable();
            $table->unsignedBigInteger('created_by_id');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->timestamps();
        });

        Schema::create('approval_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->enum('request_type', ['Edit', 'Remove', 'Public']);
            $table->unsignedBigInteger('requested_by');
            $table->enum('status', ['Pending', 'Approved', 'Rejected']);
            $table->unsignedBigInteger('admin_id');
            $table->dateTime('review_at')->nullable();
            $table->timestamps();
        });

        Schema::create('approval_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->enum('action', ['Approved', 'Rejected']);
            $table->text('reason')->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->timestamps();
        });

        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('code', 255);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('created_by_id');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->timestamps();
        });

        Schema::create('document_folders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('folder_id');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('user_id');
            $table->text('content');
            $table->timestamps();
        });

        Schema::create('attachment_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->string('file_path');
            $table->string('file_name');
            $table->unsignedBigInteger('file_size');
            $table->string('mime_type');
            $table->unsignedBigInteger('uploaded_by_id');
            $table->timestamps();
        });

        Schema::table('folders', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('folders')->onDelete('cascade');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('document_folders', function (Blueprint $table) {
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
        });

        Schema::table('approval_history', function (Blueprint $table) {
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('approval_requests', function (Blueprint $table) {
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('attachment_files', function (Blueprint $table) {
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('uploaded_by_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('attachment_files', function (Blueprint $table) {
            $table->dropForeign(['document_id']);
            $table->dropForeign(['uploaded_by_id']);
        });

        Schema::table('approval_requests', function (Blueprint $table) {
            $table->dropForeign(['document_id']);
            $table->dropForeign(['admin_id']);
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['document_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('approval_history', function (Blueprint $table) {
            $table->dropForeign(['document_id']);
            $table->dropForeign(['admin_id']);
        });

        Schema::table('document_folders', function (Blueprint $table) {
            $table->dropForeign(['document_id']);
            $table->dropForeign(['folder_id']);
        });

        Schema::table('folders', function (Blueprint $table) {
            $table->dropForeign(['created_by_id']);
            $table->dropForeign(['updated_by_id']);
            $table->dropForeign(['parent_id']);
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['created_by_id']);
            $table->dropForeign(['updated_by_id']);
        });

        Schema::dropIfExists('attachment_files');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('document_folders');
        Schema::dropIfExists('folders');
        Schema::dropIfExists('approval_history');
        Schema::dropIfExists('approval_requests');
        Schema::dropIfExists('documents');
    }
};
