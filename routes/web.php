<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('home');
//});

Debugbar::init();

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact-us', [\App\Http\Controllers\HomeController::class, 'contactUs'])->name('contactUs');
Route::get('/privacy', [\App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy');

//Jobs Search
Route::get('/job-search', [\App\Http\Controllers\JobsController::class, 'search'])->name('job-search');

//Single Job
Route::get('/single-job/{id}', [\App\Http\Controllers\JobsController::class, 'single'])->name('single-job');
Route::post('/single-job/saveJob', [\App\Http\Controllers\JobsController::class, 'saveJob'])->name('jobs.save');
Route::post('/single-job/apply', [\App\Http\Controllers\JobsController::class, 'applyJob'])->name('jobs.apply');

//Dashboad
Route::get('/dashboard', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');
//My Profile
Route::get('/dashboard/myprofile', [\App\Http\Controllers\Dashboard\UserController::class, 'myProfile'])->name('myProfile');
Route::put('/dashboard/update-profile', [\App\Http\Controllers\Dashboard\UserController::class, 'update'])->name('user.update');
Route::put('/dashboard/update-profile/contact', [\App\Http\Controllers\Dashboard\UserController::class, 'updateContact'])->name('user.updateContact');
Route::put('/dashboard/update-profile/social', [\App\Http\Controllers\Dashboard\UserController::class, 'updateSocial'])->name('user.updateSocial');
Route::put('/dashboard/update-profile/cv', [\App\Http\Controllers\Dashboard\UserController::class, 'updateCv'])->name('user.updateCv');
//Post Job
Route::get('/dashboard/post-job', [\App\Http\Controllers\JobsController::class, 'postUi'])->name('post-job');
Route::post('/dashboard/post-job', [\App\Http\Controllers\JobsController::class, 'store'])->name('jobs.store');
//Bookmark Jobs
Route::get('/dashboard/bookmark-jobs', [\App\Http\Controllers\Dashboard\SavedJobsController::class, 'index'])->name('user.bookmark-jobs');
Route::delete('/dashboard/bookmark-jobs/{id}', [\App\Http\Controllers\Dashboard\SavedJobsController::class, 'delete'])->name('savedJob.delete');
//Applied Jobs
Route::get('/dashboard/applied-jobs', [\App\Http\Controllers\Dashboard\AppliedJobsController::class, 'index'])->name('user.appliedJob');
Route::delete('/dashboard/applied-jobs/{id}', [\App\Http\Controllers\Dashboard\AppliedJobsController::class, 'delete'])->name('user.appliedJob.delete');
//Manage Jobs
Route::get('/dashboard/manage-jobs', [\App\Http\Controllers\Dashboard\ManageJobsController::class, 'index'])->name('user.manage-jobs');
Route::get('/dashboard/manage-jobs/{id}/edit', [\App\Http\Controllers\Dashboard\ManageJobsController::class, 'editUi'])->middleware('checkJobEditPermission')->name('user.edit-jobs');
Route::put('/dashboard/manage-jobs/edit', [\App\Http\Controllers\Dashboard\ManageJobsController::class, 'editJob'])->name('user.edit-jobs.edit');
Route::delete('/dashboard/manage-jobs/{id}', [\App\Http\Controllers\Dashboard\ManageJobsController::class, 'delete'])->name('user.manage-jobs.delete');
//Manage Applicant
Route::get('/dashboard/manage-applicant', [\App\Http\Controllers\Dashboard\ManageApplicantController::class, 'index'])->name('user.manage-applicant');
Route::get('/dashboard/manage-applicant/download-cv/{cv_name}', [\App\Http\Controllers\Dashboard\ManageApplicantController::class, 'downloadCv'])->name('user.manage-applicant.cv');
Route::post('/dashboard/manage-applicant/accept', [\App\Http\Controllers\Dashboard\ManageApplicantController::class, 'accept'])->name('user.manage-applicant.accept');
Route::post('/dashboard/manage-applicant/reject', [\App\Http\Controllers\Dashboard\ManageApplicantController::class, 'reject'])->name('user.manage-applicant.reject');
//Change Password
Route::get('/dashboard/change-password', [\App\Http\Controllers\Dashboard\DashboardController::class, 'changePassword'])->name('change-password');
Route::put('/dashboard/change-password', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'changePassword'])->name('user.changePassword');

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'
], function () {
    //Dashboard
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    //Jobs
    Route::get('/manage-jobs', [\App\Http\Controllers\Admin\JobController::class, 'index'])->name('admin.jobs');
    Route::put('/job/{id}/reject', [\App\Http\Controllers\Admin\JobController::class, 'rejectJob'])->name('admin.rejectJob');
    Route::put('/job/{id}/approve', [\App\Http\Controllers\Admin\JobController::class, 'approveJob'])->name('admin.approveJob');
    //Users
    Route::get('/manage-users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users');
    Route::put('/user/update-role', [\App\Http\Controllers\Admin\UserController::class, 'updateRole'])->name('admin.updateRole');
    Route::delete('/user/{id}', [\App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
    //Roles
    Route::get('/manage-roles', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.roles');
    Route::post('/manage-roles/add', [\App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.role.store');
    Route::delete('/manage-roles/delete/{id}', [\App\Http\Controllers\Admin\RoleController::class, 'delete'])->name('admin.role.delete');
    Route::put('/manage-roles/update', [\App\Http\Controllers\Admin\RoleController::class, 'update'])->name('admin.role.update');
    //Categories
    Route::get('/manage-category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category');
    Route::post('/manage-category/add', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
    Route::delete('/manage-category/delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.category.delete');
    Route::put('/manage-category/update', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
    //Job Types
    Route::get('/manage-job-type', [\App\Http\Controllers\Admin\JobTypeController::class, 'index'])->name('admin.job-types');
    Route::post('/manage-job-type/add', [\App\Http\Controllers\Admin\JobTypeController::class, 'store'])->name('admin.job-type.store');
    Route::delete('/manage-job-type/delete/{id}', [\App\Http\Controllers\Admin\JobTypeController::class, 'delete'])->name('admin.job-type.delete');
    Route::put('/manage-job-type/update', [\App\Http\Controllers\Admin\JobTypeController::class, 'update'])->name('admin.job-type.update');
    //Experience
    Route::get('/manage-experience', [\App\Http\Controllers\Admin\ExperienceController::class, 'index'])->name('admin.experience');
    Route::post('/manage-experience/add', [\App\Http\Controllers\Admin\ExperienceController::class, 'store'])->name('admin.experience.store');
    Route::delete('/manage-experience/delete/{id}', [\App\Http\Controllers\Admin\ExperienceController::class, 'delete'])->name('admin.experience.delete');
    Route::put('/manage-experience/update', [\App\Http\Controllers\Admin\ExperienceController::class, 'update'])->name('admin.experience.update');
});
