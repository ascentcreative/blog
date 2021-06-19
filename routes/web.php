<?php

use Illuminate\Support\Facades\Route;





Route::middleware(['web'])->namespace('AscentCreative\Blog\Controllers')->group(function () {

    $blog_path = config('blog.blog_path');
    Route::get('/' . $blog_path, function() {

        return "whoo - you got a blog!";

    });



    /** Admin Routes */

    Route::prefix('admin/blog')->namespace('Admin')->middleware(['useAdminLogin', 'auth', 'can:administer'])->group(function() {

        Route::get('/posts/{post}/delete', [AscentCreative\Blog\Controllers\Admin\PostController::class, 'delete']);
        Route::resource('/posts', PostController::class)->names([
            'index' => 'admin.blog.posts' 
        ]);

        Route::get('/authors/{author}/delete', [AscentCreative\Blog\Controllers\Admin\AuthorController::class, 'delete']);
        Route::resource('/authors', AuthorController::class)->names([
            'index' => 'admin.blog.authors' 
        ]);

    });


});