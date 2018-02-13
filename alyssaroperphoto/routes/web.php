<?php


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/posts', 'PostController', ['except' => ['show']]);

Route::resource('/component-api/photos', 'PhotoController', ['only' => ['index', 'store', 'update', 'destroy']]);

Route::resource('/component-api/post-types', 'PostTypeController');
Route::get('/component-api/menu', 'PostTypeController@menu');

Route::resource('/component-api/newsletter-subscribers', 'NewsletterSubscriberController', ['except' => ['create']]);

Route::resource('email', 'EmailController', ['only' => ['index', 'show', 'store', 'create']]);

Route::get('/{post}', 'PostController@show')->name('posts.show');

Route::get('/', 'PostController@frontPage')->name('welcome');