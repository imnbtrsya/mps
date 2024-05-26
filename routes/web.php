<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard-mentor', function () {
        return view('MentorDashboard');
    })->name('MentorDashboard');

    Route::get('/dashboard-platinum', function () {
        return view('PlatinumDashboard');
    })->name('PlatinumDashboard');

    Route::get('/dashboard-staff', function () {
        return view('StaffDashboard');
    })->name('StaffDashboard');
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


// Research route
Route::get('/research/myresearch', [ResearchController::class, 'ResearchInfo'])->name('manage_research.researchInfo');
Route::get('/addResearch', [ResearchController::class, 'addResearch'])->name('manage_research.addResearch');
Route::post('/saveResearch', [ResearchController::class, 'saveResearch'])->name('manage_research.addResearch');
Route::get('/editResearch/{id}', [ResearchController::class, 'editResearch'])->name('manage_research.editResearch');
Route::post('/updateResearch', [ResearchController::class, 'updateResearch'])->name('manage_research.editResearch');
Route::get('/deleteResearch/{id}', [ResearchController::class, 'deleteResearch'])->name('manage_research.editResearch');
Route::get('/viewResearch/{id}', [ResearchController::class, 'view'])->name('manage_research.viewResearch');

// Registration route
Route::get('/register', [UsersController::class, 'listPlatinum'])->name('manage_registration.listPlatinum');
Route::get('/addregister', [UsersController::class, 'addregister'])->name('manage_registration.addRegistration');
Route::post('/saveRegistration', [UsersController::class, 'saveRegistration'])->name('manage_registration.addRegistration');
Route::get('/viewRegister/{id}', [UsersController::class, 'viewRegister'])->name('manage_registration.viewRegistration');

Route::get('/expertdomain/uploadexpert', [ExpertController::class, 'UploadExpert'])->name('manage_expertdomain.UploadExpert');

Route::get('/expertdomain/myexpertlist', [ExpertController::class, 'MyExpertList'])->name('manage_expertdomain.MyExpertList');

Route::get('/expertdomain/uploadexpert', [ExpertController::class, 'UploadExpert'])->name('manage_expertdomain.UploadExpert');

Route::get('/expertdomain/myexpertlist', [ExpertController::class, 'MyExpertList'])->name('manage_expertdomain.MyExpertList');

require __DIR__.'/auth.php';
Route::get('/expertdomain/uploadexpert', [ExpertController::class, 'UploadExpert'])->name('manage_expertdomain.UploadExpert');

Route::get('/expertdomain/myexpertlist', [ExpertController::class, 'MyExpertList'])->name('manage_expertdomain.MyExpertList');
