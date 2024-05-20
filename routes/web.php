<?php

use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ExpertController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Publication route
Route::get('/publication/mypublication', [PublicationController::class, 'MyPublication'])->name('manage_publication.PlatinumMyPublication');

Route::get('/publication/upload', [PublicationController::class, 'upload'])->name('manage_publication.PlatinumUploadPublication');
Route::post('/publication/mypublication', [PublicationController::class, 'store'])->name('manage_publication.store');

Route::get('/publication/{publication}/edit', [PublicationController::class, 'edit'])->name('manage_publication.PlatinumEditPublication');
Route::put('/publication/{publication}/update', [PublicationController::class, 'update'])->name('manage_publication.update');

Route::delete('/publication/{publication}/delete', [PublicationController::class, 'delete'])->name('manage_publication.delete');

Route::get('/publication/{publication}/view', [PublicationController::class, 'view'])->name('manage_publication.PlatinumViewPublication');

Route::get('/publication/search', [PublicationController::class, 'search'])->name('manage_publication.PlatinumSearchPublication');

Route::get('/publication/list', [PublicationController::class, 'list'])->name('manage_publication.MentorListPublication');

// Expert route
Route::get('/expertdomain/findexpert', [ExpertController::class, 'FindExpert'])->name('manage_expertdomain.FindExpert');

Route::get('/expertdomain/uploadexpert', [ExpertController::class, 'UploadExpert'])->name('manage_expertdomain.UploadExpert');

Route::get('/expertdomain/myexpertlist', [ExpertController::class, 'MyExpertList'])->name('manage_expertdomain.MyExpertList');
