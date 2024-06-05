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

Route::middleware('auth')->group(function () {
    Route::get('/profile/view', [ProfileController::class, 'show'])->name('profile.show');
    });

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
Route::get('/platinum/publication/mypublication', [PublicationController::class, 'MyPublication'])->name('manage_publication.PlatinumMyPublication');

Route::get('/platinum/publication/upload', [PublicationController::class, 'upload'])->name('manage_publication.PlatinumUploadPublication');
Route::post('/platinum/publication/mypublication', [PublicationController::class, 'store'])->name('manage_publication.store');

Route::get('/platinum/publication/{publication}/edit', [PublicationController::class, 'edit'])->name('manage_publication.PlatinumEditPublication');
Route::put('/platinum/publication/{publication}/update', [PublicationController::class, 'update'])->name('manage_publication.update');

Route::delete('/platinum/publication/{publication}/delete', [PublicationController::class, 'delete'])->name('manage_publication.delete');

Route::get('/platinum/publication/{publication}/view', [PublicationController::class, 'viewPlatinum'])->name('manage_publication.PlatinumViewPublication');

Route::get('/platinum/publication/search', [PublicationController::class, 'search'])->name('manage_publication.PlatinumSearchPublication');

Route::get('/mentor/publication/list', [PublicationController::class, 'list'])->name('manage_publication.MentorListPublication');
Route::get('/mentor/publication/{publication}/generate', [PublicationController::class, 'generatePDF'])->name('manage_publication.MentorGeneratePublication');
Route::get('/mentor/publication/{publication}/view', [PublicationController::class, 'viewMentor'])->name('manage_publication.MentorViewPublication');

// Expert route
Route::get('/expertdomain/findexpert', [ExpertController::class, 'FindExpert'])->name('manage_expertdomain.FindExpert');

Route::get('/expertdomain/uploadexpert', [ExpertController::class, 'UploadExpert'])->name('manage_expertdomain.UploadExpert');
Route::post('/expertdomain/myexpertlist', [ExpertController::class, 'SaveExpert'])->name('manage_expertdomain.SaveExpert');

Route::get('/expertdomain/{expertdomain}/viewexpert', [ExpertController::class, 'view'])->name('manage_expertdomain.ViewExpert');
Route::get('/expertdomain/{expertdomain}/viewpublication', [ExpertController::class, 'viewpublication'])->name('manage_expertdomain.ViewPublication');

Route::get('/expertdomain/myexpertlist', [ExpertController::class, 'MyExpertList'])->name('manage_expertdomain.MyExpertList');

// Research Information route

Route::get('/research/myresearch', [ResearchController::class, 'ResearchInfo'])->name('manage_research.researchInfo');
Route::get('/addResearch', [ResearchController::class, 'addResearch'])->name('manage_research.addResearch');
Route::post('/saveResearch', [ResearchController::class, 'saveResearch'])->name('manage_research.saveResearch');
Route::get('/editResearch/{id}', [ResearchController::class, 'editResearch'])->name('manage_research.editResearch');
Route::post('/updateResearch', [ResearchController::class, 'updateResearch'])->name('manage_research.updateResearch');
Route::get('/deleteResearch/{id}', [ResearchController::class, 'deleteResearch'])->name('manage_research.deleteResearch');
Route::get('/viewResearch/{id}', [ResearchController::class, 'view'])->name('manage_research.viewResearch');

// Registration route
Route::get('/platinumList', [UsersController::class, 'listPlatinum'])->name('manage_registration.listPlatinum');
Route::get('/adminList', [UsersController::class, 'AdminlistPlatinum'])->name('manage_registration.AdminlistPlatinum');
Route::get('/addregister', [UsersController::class, 'addregister'])->name('manage_registration.addRegistration');
Route::post('/saveRegistration', [UsersController::class, 'saveRegistration'])->name('manage_registration.addRegistration');
Route::get('staff/viewRegister/{id}', [UsersController::class, 'StaffviewRegister'])->name('manage_registration.StaffviewRegistration');
Route::get('platinum/viewRegister/{id}', [UsersController::class, 'PlatinumviewRegister'])->name('manage_registration.PlatinumviewRegistration');
Route::get('/mentorList', [UsersController::class, 'MentorlistPlatinum'])->name('manage_registration.MentorlistPlatinum');
Route::get('/MentorviewRegister/{id}', [UsersController::class, 'MentorviewRegister'])->name('manage_registration.Mentorview');

Route::get('/viewProfile/{id}', [UsersController::class, 'viewProfile'])->name('manage_profile.PlatinumviewProfile');
Route::get('/editProfile/{id}', [UsersController::class, 'editProfile'])->name('manage_profile.PlatinumeditProfile');
Route::put('/updateProfile/{id}', [UsersController::class, 'updateProfile'])->name('manage_profile.PlatinumupdateProfile');

require __DIR__.'/auth.php';
