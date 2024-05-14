<?php

use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ExpertController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/publication/mypublication', [PublicationController::class, 'MyPublication'])->name('manage_publication.PlatinumMyPublication');

Route::get('/publication/upload', [PublicationController::class, 'upload'])->name('manage_publication.PlatinumUploadPublication');
Route::post('/publication/mypublication', [PublicationController::class, 'store'])->name('manage_publication.store');

Route::get('/publication/{publication}/edit', [PublicationController::class, 'edit'])->name('manage_publication.PlatinumEditPublication');
Route::put('/publication/{publication}/update', [PublicationController::class, 'update'])->name('manage_publication.update');

Route::delete('/publication/{publication}/delete', [PublicationController::class, 'delete'])->name('manage_publication.delete');

Route::get('/expertdomain/findexpert', [ExpertController::class, 'FindExpert'])->name('manage_expertdomain.FindExpert');