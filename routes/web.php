<?php

use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/publication/view', [PublicationController::class, 'view'])->name('manage_publication.PlatinumViewPublication');

Route::get('/publication/upload', [PublicationController::class, 'upload'])->name('manage_publication.PlatinumUploadPublication');
