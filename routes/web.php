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
Route::get('/publication/platinum/mypublication', [PublicationController::class, 'MyPublication'])->name('manage_publication.PlatinumMyPublication');

Route::get('/publication/platinum/upload', [PublicationController::class, 'upload'])->name('manage_publication.PlatinumUploadPublication');
Route::post('/publication/platinum/mypublication', [PublicationController::class, 'store'])->name('manage_publication.store');

Route::get('/publication/platinum/{publication}/edit', [PublicationController::class, 'edit'])->name('manage_publication.PlatinumEditPublication');
Route::put('/publication/platinum/{publication}/update', [PublicationController::class, 'update'])->name('manage_publication.update');

Route::delete('/publication/platinum/{publication}/delete', [PublicationController::class, 'delete'])->name('manage_publication.delete');

Route::get('/publication/platinum/{publication}/view', [PublicationController::class, 'viewPlatinum'])->name('manage_publication.PlatinumViewPublication');

Route::get('/publication/platinum/search', [PublicationController::class, 'search'])->name('manage_publication.PlatinumSearchPublication');

Route::get('/publication/mentor/list', [PublicationController::class, 'list'])->name('manage_publication.MentorListPublication');
Route::get('/publication/mentor/{publication}/view', [PublicationController::class, 'viewMentor'])->name('manage_publication.MentorViewPublication');

Route::get('/publication/mentor/generate-report/{publication}', [PublicationController::class, 'generatePDF'])->name('manage_publication.MentorGeneratePublication');


// Expert route
Route::get('/expertdomain/findexpert', [ExpertController::class, 'FindExpert'])->name('manage_expertdomain.FindExpert');

Route::get('/expertdomain/uploadexpert', [ExpertController::class, 'UploadExpert'])->name('manage_expertdomain.UploadExpert');
Route::post('/expertdomain/uploadexpert', [ExpertController::class, 'submit'])->name('manage_expertdomain.submit');

Route::get('/expertdomain/viewexpert', [ExpertController::class, 'view'])->name('manage_expertdomain.ViewExpert');
Route::get('/expertdomain/viewpublicationexpert', [ExpertController::class, 'viewpublication'])->name('manage_expertdomain.ViewPublication');

Route::get('/expertdomain/myexpertlist', [ExpertController::class, 'MyExpertList'])->name('manage_expertdomain.MyExpertList');

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

require __DIR__.'/auth.php';
