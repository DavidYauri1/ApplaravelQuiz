<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TestAnswerController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\UserProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('quiz/{quiz}/{slug?}', [HomeController::class, 'show'])->name('quiz.show');
Route::get('results', [ResultsController::class, 'index'])->name('results.index');
Route::get('results/{test}', [ResultsController::class, 'show'])->name('results.show');
Route::view('leaderboard', 'front.leaderboard')->name('leaderboard');

Auth::routes(['register' => true]);

Route::get('auth/{provider}', [SocialiteController::class, 'redirectToProvider'])->name('auth.socialite');
Route::get('auth/{provider}/callback', [SocialiteController::class, 'handleProviderCallback']);

Route::group(['middleware' => ['auth']], function () {
    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Topics
    Route::resource('topics', TopicController::class, ['except' => ['store', 'update', 'destroy']]);

    // Questions
    Route::resource('questions', QuestionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Quizzes
    Route::resource('quizzes', QuizController::class, ['except' => ['store', 'update', 'destroy']]);

    // Test
    Route::resource('tests', TestController::class, ['except' => ['store', 'update', 'destroy']]);

    // Comments
    Route::resource('comments', CommentController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
