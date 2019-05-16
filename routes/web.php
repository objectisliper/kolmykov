<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ArticlesController@index');

//blog
Route::get('/{category}/{id}-{slug}.html', 'ArticlesController@showArticle')->where('id', '\d')->name('blog.show');
Route::get('/about.html', 'AboutController@index')->name('about.show');
Route::get('/contact.html', 'ContactController@index')->name('contact.show');
Route::get('/categories.html', 'CategoriesController@index')->name('categories.show');
Route::get('/category/{id}/', 'ArticlesController@showCategory')->where('id', '\d')->name('articles.category.show');
Route::get('/tag/{id}/', 'ArticlesController@showTag')->where('id', '\d')->name('articles.tag.show');


//mail
Route::post('/send', 'MailController@send');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});

//account

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', function () {
        \Auth::logout();
        return redirect(route('login'));
    })->name('logout');
    Route::get('/my/account', 'AccountController@index')->name('account');

    //comments
    Route::post('/comments/add', 'CommentsController@addComment')->name('comments.add');

    // admin
    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
        Route::get('/', 'Admin\AccountController@index')->name('admin');
        // categories
        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');
        Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
        Route::post('/categories/add', 'Admin\CategoriesController@addRequestCategory');
        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')
            ->where('id', '\d+')
        ->name('categories.edit');
        Route::post('/categories/edit/{id}', 'Admin\CategoriesController@editRequestCategory')
            ->where('id', '\d+');
        Route::delete('/categories/delete', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');
        // articles
        Route::get('/articles', 'Admin\ArticlesController@index')->name('articles');
        Route::get('/articles/add', 'Admin\ArticlesController@addArticle')->name('articles.add');
        Route::post('/articles/add', 'Admin\ArticlesController@addRequestArticle');
        Route::get('/articles/edit/{id}', 'Admin\ArticlesController@editArticle')->where('id', '\d+')->name('articles.edit');
        Route::post('/articles/edit/{id}', 'Admin\ArticlesController@editRequestArticle')->where('id', '\d+');
        Route::delete('/articles/delete', 'Admin\ArticlesController@deleteArticle')->name('articles.delete');

        // tags
        Route::get('/tags', 'Admin\TagsController@index')->name('tags');
        Route::get('/tags/add', 'Admin\TagsController@addTag')->name('tags.add');
        Route::post('/tags/add', 'Admin\TagsController@addRequestTag');
        Route::get('/tags/edit/{id}', 'Admin\TagsController@editTag')
            ->where('id', '\d+')
            ->name('tags.edit');
        Route::post('/tags/edit/{id}', 'Admin\TagsController@editRequestTag')
            ->where('id', '\d+');
        Route::delete('/tags/delete', 'Admin\TagsController@deleteTag')->name('tags.delete');

        /* Users */
        Route::get('/users', 'Admin\UsersController@index')->name('users');

        Route::get('/comments', 'Admin\CommentsController@index')->name('comments');
        Route::get('/comments/accepted/{id}', 'Admin\CommentsController@acceptComment')
            ->where('id', '\d+')->name('comment.accepted');

        //about
        Route::get('/about', 'Admin\AboutController@index')->name('about');
        Route::post('/about', 'Admin\AboutController@editAbout')
            ->where('id', '\d+');
        //contact
        Route::get('/contact', 'Admin\ContactController@index')->name('contact');
        Route::post('/contact', 'Admin\ContactController@editContact')
            ->where('id', '\d+');
    });
});

