<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
Route::get('/platinum/expertdomain/findexpert', [ExpertController::class, 'FindExpert'])->name('manage_expertdomain.FindExpert');

Route::get('/platinum/expertdomain/uploadexpert', [ExpertController::class, 'UploadExpert'])->name('manage_expertdomain.UploadExpert');
Route::post('/platinum/expertdomain/savexpert', [ExpertController::class, 'SaveExpert'])->name('manage_expertdomain.SaveExpert');

Route::get('/platinum/expertdomain/{expertdomain}/viewexpert', [ExpertController::class, 'view'])->name('manage_expertdomain.ViewExpert');
Route::get('/platinum/expertdomain/{expertdomain}/viewpublication', [ExpertController::class, 'viewpublication'])->name('manage_expertdomain.ViewPublication');

Route::get('/platinum/expertdomain/myexpertlist', [ExpertController::class, 'MyExpertList'])->name('manage_expertdomain.MyExpertList');

Route::get('/platinum/expertdomain/{expertdomain}/edit', [ExpertController::class, 'edit'])->name('manage_expertdomain.EditExpert');
Route::delete('/platinum/expertdomain/{expertdomain}/delete', [ExpertController::class, 'destroy'])->name('manage_expertdomain.DeleteExpert');

// Research Information route

Route::get('platinum/research/listResearch', [ResearchController::class, 'ResearchInfo'])->name('manage_research.researchInfo');
Route::get('platinum/research/addResearch', [ResearchController::class, 'addResearch'])->name('manage_research.addResearch');
Route::post('platinum/research/saveResearch', [ResearchController::class, 'saveResearch'])->name('manage_research.saveResearch');
Route::get('platinum/research/editResearch/{id}', [ResearchController::class, 'editResearch'])->name('manage_research.editResearch');
Route::post('platinum/research/updateResearch', [ResearchController::class, 'updateResearch'])->name('manage_research.updateResearch');
Route::get('platinum/research/deleteResearch/{id}', [ResearchController::class, 'deleteResearch'])->name('manage_research.deleteResearch');
Route::get('platinum/research/viewResearch/{id}', [ResearchController::class, 'view'])->name('manage_research.viewResearch');

// Registration route
Route::get('platinum/register/platinumList', [UsersController::class, 'listPlatinum'])->name('manage_registration.listPlatinum');
Route::get('staff/register/staffList', [UsersController::class, 'StafflistPlatinum'])->name('manage_registration.StafflistPlatinum');
Route::get('staff/register/addregister', [UsersController::class, 'addregister'])->name('manage_registration.addRegistration');
Route::post('staff/register/saveRegistration', [UsersController::class, 'saveRegistration'])->name('manage_registration.addRegistration');
Route::get('staff/register/viewRegister/{id}', [UsersController::class, 'StaffviewRegister'])->name('manage_registration.StaffviewRegistration');
Route::get('platinum/register/viewRegister/{id}', [UsersController::class, 'PlatinumviewRegister'])->name('manage_registration.PlatinumviewRegistration');
Route::get('mentor/register/mentorList', [UsersController::class, 'MentorlistPlatinum'])->name('manage_registration.MentorlistPlatinum');
Route::get('mentor/register/MentorviewRegister/{id}', [UsersController::class, 'MentorviewRegister'])->name('manage_registration.Mentorview');

Route::get('/viewProfile/{id}', [UsersController::class, 'viewProfile'])->name('manage_profile.PlatinumviewProfile');
Route::get('/editProfile/{id}', [UsersController::class, 'editProfile'])->name('manage_profile.PlatinumeditProfile');
Route::put('/updateProfile/{id}', [UsersController::class, 'updateProfile'])->name('manage_profile.PlatinumupdateProfile');

Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');

require __DIR__.'/auth.php';
