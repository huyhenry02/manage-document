<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('code', 255)->nullable();
            $table->text('content');
            $table->date('start_time');
            $table->date('end_time');
            $table->boolean('is_private')->default(false);
            $table->string('note', 255)->nullable();
            $table->unsignedBigInteger('folder_id');
            $table->unsignedBigInteger('created_by_id');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->timestamps();
        });

        Schema::create('document_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->enum('action', ['public_document', 'edit_document']);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('reason')->nullable();
            $table->json('json_data_update')->nullable();
            $table->unsignedBigInteger('created_by_id');
            $table->unsignedBigInteger('confirmed_by_id')->nullable();
            $table->enum('user_type', ['admin', 'agent']);
            $table->timestamps();
        });

        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('created_by_id');
            $table->unsignedBigInteger('updated_by_id')->nullable();
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
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('document_actions', function (Blueprint $table) {
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('confirmed_by_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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

        Schema::table('document_actions', function (Blueprint $table) {
            $table->dropForeign(['document_id']);
            $table->dropForeign(['created_by_id']);
            $table->dropForeign(['confirmed_by_id']);
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['document_id']);
            $table->dropForeign(['user_id']);
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
        Schema::dropIfExists('folders');
        Schema::dropIfExists('document_actions');
        Schema::dropIfExists('documents');
    }
};
