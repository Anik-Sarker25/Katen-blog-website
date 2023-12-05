<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\PostController;

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
// Route::get('/', function () {
//     return view('home');
// });
// Frontend section
Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index'])->name('home');

// Single post routes
Route::get('/single/post/{id}', [App\Http\Controllers\FrontendSinglePostController::class, 'index'])->name('single.post');

// Single page routes
Route::get('/contact', [App\Http\Controllers\FrontendSinglePageController::class, 'index'])->name('contact');
Route::get('/about', [App\Http\Controllers\FrontendSinglePageController::class, 'about'])->name('about');

// Category post page routes
Route::get('/category/post/{id}', [App\Http\Controllers\FrontendCategoryPostController::class, 'index'])->name('category.post');
Route::get('/tag/post/{id}', [App\Http\Controllers\FrontendCategoryPostController::class, 'tag_post'])->name('tag.post');

// Personal page routes
Route::get('/personal', [App\Http\Controllers\PersonalPageController::class, 'index'])->name('personal');

// Comment route
Route::post('/post/comment', [App\Http\Controllers\CommentController::class, 'index'])->name('comment');

// Search route
Route::get('/search', [App\Http\Controllers\FrontendSearchController::class, 'index'])->name('search');

// Contact routes
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'insert'])->name('contact.insert');




// Backend section
Auth::routes(['register' => false]);

Route::middleware(['web', 'auth'])->group(function () {

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Profile routes
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile/image/update/{id}', [App\Http\Controllers\ProfileController::class, 'image_update'])->name('profile.image.update');
Route::post('/profile/about/insert/{id}', [App\Http\Controllers\ProfileController::class, 'update_info'])->name('aboutinfo.insert');
Route::post('/profile/username/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.name.update');
Route::post('/profile/email/update/{id}', [App\Http\Controllers\ProfileController::class, 'email_update'])->name('profile.email.update');
Route::post('/profile/password/update/{id}', [App\Http\Controllers\ProfileController::class, 'password_update'])->name('profile.password.update');

// Tag routes
Route::get('/tags', [App\Http\Controllers\TagsController::class, 'index'])->name('tags');
Route::post('/tags/insert', [App\Http\Controllers\TagsController::class, 'insert'])->name('tags.add');
Route::post('/tags/status/{id}', [App\Http\Controllers\TagsController::class, 'status'])->name('tags.status');
Route::post('/tags/delete/{id}', [App\Http\Controllers\TagsController::class, 'delete'])->name('tags.delete');
Route::post('/tags/restore/{id}', [App\Http\Controllers\TagsController::class, 'restore'])->name('tags.restore');
Route::post('/tags/forcedelete/{id}', [App\Http\Controllers\TagsController::class, 'force_delete'])->name('tags.force_delete');

// Category routes
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::post('/categories/insert', [App\Http\Controllers\CategoryController::class, 'insert'])->name('categories.insert');
Route::post('/categories/status/{id}', [App\Http\Controllers\CategoryController::class, 'status'])->name('categories.status');
Route::get('/categories/edit_view/{id}', [App\Http\Controllers\CategoryController::class, 'edit_view'])->name('categories.edit_view');
Route::post('/categories/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('categories.delete');
Route::post('/categories/restore/{id}', [App\Http\Controllers\CategoryController::class, 'restore'])->name('categories.restore');
Route::post('/categories/force_delete/{id}', [App\Http\Controllers\CategoryController::class, 'force_delete'])->name('categories.force_delete');

// Post routes
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/posts/add', [App\Http\Controllers\PostController::class, 'add_view'])->name('posts.add.view');
Route::post('/posts/insert', [App\Http\Controllers\PostController::class, 'insert'])->name('posts.insert');
Route::post('/posts/status/{id}', [App\Http\Controllers\PostController::class, 'status'])->name('posts.status');
Route::get('/posts/edit_view/{id}', [App\Http\Controllers\PostController::class, 'edit_view'])->name('posts.edit_view');
Route::post('/posts/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete');
Route::post('/posts/restore/{id}', [App\Http\Controllers\PostController::class, 'restore'])->name('posts.restore');
Route::post('/posts/force_delete/{id}', [App\Http\Controllers\PostController::class, 'force_delete'])->name('posts.force_delete');

// Manage users role routes
Route::get('/users', [App\Http\Controllers\RoleManageController::class, 'index'])->name('users');
Route::get('/users/add', [App\Http\Controllers\RoleManageController::class, 'add_view'])->name('users.add.view');
Route::post('/users/add/insert', [App\Http\Controllers\RoleManageController::class, 'insert'])->name('users.insert');
Route::post('/users/edit/{id}', [App\Http\Controllers\RoleManageController::class, 'edit'])->name('users.edit');
Route::post('/users/delete/{id}', [App\Http\Controllers\RoleManageController::class, 'delete'])->name('users.delete');

// Page routes
Route::get('/pages', [App\Http\Controllers\PageController::class, 'index'])->name('pages');
Route::get('/pages/add', [App\Http\Controllers\PageController::class, 'add_view'])->name('pages.add.view');
Route::post('/pages/add/insert', [App\Http\Controllers\PageController::class, 'insert'])->name('pages.insert');
Route::post('/pages/status/{id}', [App\Http\Controllers\PageController::class, 'status'])->name('pages.status');
Route::get('/pages/edit_view/{id}', [App\Http\Controllers\PageController::class, 'edit_view'])->name('pages.edit_view');
Route::post('/pages/edit/{id}', [App\Http\Controllers\PageController::class, 'edit'])->name('pages.edit');
Route::post('/pages/delete/{id}', [App\Http\Controllers\PageController::class, 'delete'])->name('pages.delete');
Route::post('/pages/restore/{id}', [App\Http\Controllers\PageController::class, 'restore'])->name('pages.restore');
Route::post('/pages/force_delete/{id}', [App\Http\Controllers\PageController::class, 'force_delete'])->name('pages.force_delete');

// Setting routes
Route::get('/setting', [App\Http\Controllers\SitebioController::class, 'index'])->name('setting');
Route::post('/setting/info/insert', [App\Http\Controllers\SitebioController::class, 'insert'])->name('setting.insert');
Route::get('/setting/info/edit_view/{id}', [App\Http\Controllers\SitebioController::class, 'edit_view'])->name('setting.edit_view');
Route::post('/setting/info/edit/{id}', [App\Http\Controllers\SitebioController::class, 'edit'])->name('setting.edit');
Route::post('/setting/info/status/{id}', [App\Http\Controllers\SitebioController::class, 'status'])->name('setting.status');
Route::post('/setting/info/delete/{id}', [App\Http\Controllers\SitebioController::class, 'delete'])->name('setting.delete');

// Messages routes
Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('message');
Route::post('/messages/delete/{id}', [App\Http\Controllers\MessageController::class, 'delete'])->name('message.delete');

// Comments routes
Route::get('/comments', [App\Http\Controllers\CommentsController::class, 'index'])->name('comments');
Route::post('/comments/status/{id}', [App\Http\Controllers\CommentsController::class, 'status'])->name('comment.status');
Route::post('/comments/delete/{id}', [App\Http\Controllers\CommentsController::class, 'delete'])->name('comment.delete');

});

