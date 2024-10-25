<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\DocumentController;

Route::get('/', static function () {
    return redirect()->route('auth.login');
});

Route::group([
    'prefix' => 'auth'
], static function () {
    Route::get('/login', [AuthController::class, 'show_login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('auth.post_login');
    Route::get('/logout', [AuthController::class, 'postLogout'])->name('auth.logout');
});

Route::group([
    'prefix' => 'document',
    'middleware' => 'auth'
], static function () {
    Route::get('/', [DocumentController::class, 'show_index'])->name('document.index');
    Route::get('/show-private-document', [DocumentController::class, 'showPrivateDocument'])->name('document.showPrivateDocument');
    Route::get('/show-list-request-for-agent', [DocumentController::class, 'showListRequestForAgent'])->name('document.showListRequestForAgent');
    Route::get('/show-list-request-for-admin', [DocumentController::class, 'showListRequestForAdmin'])->name('document.showListRequestForAdmin');
    Route::get('/pdf/preview/{name}', [DocumentController::class, 'previewPdf'])->name('pdf.preview');

    Route::get('/creat', [DocumentController::class, 'show_create'])->name('document.create');
    Route::get('/update/{model}', [DocumentController::class, 'show_update'])->name('document.update');
    Route::get('/request-update/{model}', [DocumentController::class, 'show_request_update'])->name('document.show_request_update');
    Route::get('/detail/{model}', [DocumentController::class, 'show_detail'])->name('document.detail');
    Route::get('/detail-request-public/{documentAction}', [DocumentController::class, 'showRequestPublicDetail'])->name('document.showRequestPublicDetail');
    Route::get('/detail-request-update/{documentAction}', [DocumentController::class, 'showRequestUpdateDetail'])->name('document.showRequestUpdateDetail');
    Route::get('/delete-document/{document}', [DocumentController::class, 'deleteDocument'])->name('document.deleteDocument');


    Route::post('/create', [DocumentController::class, 'createDocument'])->name('document.store');
    Route::post('/action-document/{document}', [DocumentController::class, 'actionDocument'])->name('document.actionDocument');
    Route::post('/update-document/{model}', [DocumentController::class, 'update'])->name('document.updateDocument');
    Route::post('/request-update-document/{model}', [DocumentController::class, 'requestUpdateForAgent'])->name('document.requestUpdateForAgent');
    Route::post('/confirm-request/{documentAction}', [DocumentController::class, 'confirmRequest'])->name('document.confirmRequest');
});

Route::group([
    'prefix' => 'user',
    'middleware' => 'auth'
], static function () {
    Route::get('/', [UserController::class, 'show_index'])->name('user.index');
    Route::get('/create', [UserController::class, 'show_create'])->name('user.create');
    Route::get('/comment', [UserController::class, 'show_index_comment'])->name('user.show_index_comment');
    Route::get('/update/{model}', [UserController::class, 'show_update'])->name('user.update');

    Route::post('/create', [UserController::class, 'createAgent'])->name('user.store');
    Route::post('/update/{model}', [UserController::class, 'updateAgent'])->name('user.update');
    Route::post('/comment', [UserController::class, 'comment'])->name('user.comment');
    Route::get('/delete/{model}', [UserController::class, 'deleteAgent'])->name('user.delete');

});

Route::group([
    'prefix' => 'folder',
    'middleware' => 'auth'
], static function () {
    Route::get('/{folder_id}', [FolderController::class, 'show_index'])->name('folder.index');
    Route::get('/update', [FolderController::class, 'show_update'])->name('folder.update');
    Route::get('/detail', [FolderController::class, 'show_detail'])->name('folder.detail');
    Route::get('/folder-documents/{folder_id}', [FolderController::class, 'getDocumentsOfFolder'])->name('folder.documents');


    Route::post('/', [FolderController::class, 'store'])->name('folder.store');
    Route::post('/documents/move', [FolderController::class, 'moveDocuments'])->name('folder.moveDocuments');
    Route::post('/documents/delete', [FolderController::class, 'deleteDocumentsOfFolder'])->name('folder.deleteDocumentsOfFolder');
    Route::delete('/folder/{folder_id}', [FolderController::class, 'delete'])->name('folder.delete');
});

