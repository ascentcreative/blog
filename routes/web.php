<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['web'])->namespace('AscentCreative\Blog\Controllers')->group(function () {

    $blog_path = config('blog.blog_path');
    if(!config('blog.blog_disable_index')) {
        Route::get('/' . $blog_path, [AscentCreative\Blog\Controllers\BlogController::class, 'index'])
            ->name('blog.home');
    }
    Route::get('/' . $blog_path . '/{post:slug}', [AscentCreative\Blog\Controllers\BlogController::class, 'show'])->name('blog.post');

    Route::get('/' . $blog_path . '/tag/{tag:slug}', [AscentCreative\Blog\Controllers\BlogController::class, 'tag'])->name('blog.tag');
    Route::get('/' . $blog_path . '/type/{type:slug}', [AscentCreative\Blog\Controllers\BlogController::class, 'type'])->name('blog.type');
    Route::get('/' . $blog_path . '/author/{author:slug}', [AscentCreative\Blog\Controllers\BlogController::class, 'author'])->name('blog.author');


    /** Admin Routes */

    Route::prefix('admin/blog')->namespace('Admin')->middleware(['auth', 'can:administer'])->group(function() {

        Route::get('/posts/autocomplete', [AscentCreative\Blog\Controllers\Admin\PostController::class, 'autocomplete']);
        Route::get('/posts/{post}/delete', [AscentCreative\Blog\Controllers\Admin\PostController::class, 'delete']);
        Route::resource('/posts', PostController::class)->names([
            'index' => 'admin.blog.posts' 
        ]);

        Route::get('/authors/autocomplete', [AscentCreative\Blog\Controllers\Admin\AuthorController::class, 'autocomplete']);
        Route::get('/authors/{author}/delete', [AscentCreative\Blog\Controllers\Admin\AuthorController::class, 'delete']);
        Route::resource('/authors', AuthorController::class)->names([
            'index' => 'admin.blog.authors' 
        ]);

        Route::get('/types/autocomplete', [AscentCreative\Blog\Controllers\Admin\TypeController::class, 'autocomplete']);
        Route::get('/types/{type}/delete', [AscentCreative\Blog\Controllers\Admin\TypeController::class, 'delete']);
        Route::resource('/types', TypeController::class)->names([
            'index' => 'admin.blog.types'  
        ]);
        //Test

    });


});