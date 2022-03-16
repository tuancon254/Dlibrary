<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

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

Route::redirect('/', '/site/index');
Route::redirect('/admin', '/admin/home');
Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => ['auth','can:admin']], function () {
    Route::get('/home', 'HomeController@index')->name('home.index');
    Route::get('/profile', 'profileController@index')->name('profile');
    Route::get('/edit-profile','profileController@edit')->name('profile.edit');
    Route::post('/update-profile','profileController@update')->name('profile.update');
    Route::get('/resetPassword', 'profileController@showResetPasswordForm')->name('profile.reset');
    Route::post('/updatePassword', 'profileController@updatePassword')->name('profile.updatepassword');

    /**
     * documents routes
     */
    Route::group(['prefix' => 'documents','middleware' =>'can:documents-list'], function () {
        Route::get('/', 'DocumentsController@index')->name('documents.index');
        Route::get('/add', 'DocumentsController@create')->name('documents.create')->middleware('can:documents-create');
        Route::post('/store', 'DocumentsController@store')->name('documents.store');
        Route::get('/show/{id}', 'DocumentsController@show')->name('documents.show')->middleware('can:documents-show');
        Route::get('/readfile/{id}', 'DocumentsController@readfile')->name('documents.read');
        Route::get('/edit/{id}', 'DocumentsController@edit')->name('documents.edit')->middleware('can:documents-edit');
        Route::post('/update/{id}', 'DocumentsController@update')->name('documents.update');
        Route::get('/delete/{id}', 'DocumentsController@destroy')->name('documents.delete')->middleware('can:documents-delete');
        Route::get('/file/delete/{id}', 'FilesController@destroy')->name('files.delete');
        Route::get('/download/{id}', 'DocumentsController@download')->name('documents.download')->middleware('can:documents-download');
        Route::get('/search', 'DocumentsController@search')->name('documents.search')->middleware('can:documents-search');
        Route::get('/censor', 'DocumentsController@censor')->name('documents.censor');
        Route::get('/censor/show/{id}', 'DocumentsController@censor_show')->name('documents.censor-show');
        Route::get('/censor/approve/{id}', 'DocumentsController@approved')->name('documents.approve');

    });



    /**
     * users routes
     */
    Route::group(['prefix' => 'users','middleware' =>'can:user-list'], function () {
        Route::get('/list', 'userController@index')->name('user.list');
        Route::get('/create', 'userController@create')->name('user.create')->middleware('can:user-create');
        Route::get('/edit/{id}', 'userController@edit')->name('user.edit')->middleware('can:user-update');
        Route::get('/info/{id}', 'userController@show')->name('user.show')->middleware('can:user-show');
        Route::post('/update/{id}', 'userController@update')->name('user.update');
        Route::get('/delete/{id}', 'userController@destroy')->name('user.delete')->middleware('can:user-delete');
        Route::post('/add', 'userController@store')->name('user.store');
        Route::get('/search', 'userController@search')->name('user.search');
        Route::group(['prefix' => 'role', 'middleware' => 'can:user-editrole'], function () {
            Route::get('/list', 'userController@role')->name('user.role');
            Route::get('/edit/{id}', 'userController@editrole')->name('user.role.edit');
            Route::post('/update/{id}', 'userController@updaterole')->name('user.role.update');
        });
    });




    /**
     * Category routes
     */
    Route::group(['prefix' => 'category'], function () {
        Route::group(['prefix' => 'collection','middleware' => 'can:category-list'], function () {
            Route::get('/list', 'CategoryController@index')->name('category.list');
            Route::get('/create', 'CategoryController@create')->name('category.create')->middleware('can:category-create');
            Route::post('/add', 'CategoryController@store')->name('category.store');
            Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit')->middleware('can:category-edit');
            Route::post('/update/{id}', 'CategoryController@update')->name('category.update');
            Route::get('/delete/{id}', 'CategoryController@destroy')->name('category.delete')->middleware('can:category-delete');
            Route::get('/show/{id}', 'CategoryController@show')->name('category.show');
        });
        Route::group(['prefix' => 'role','middleware' => 'can:role-list'], function () {
            Route::get('/list', 'RoleController@index')->name('role.list');
            Route::get('/create', 'RoleController@create')->name('role.create')->middleware('can:role-create');
            Route::post('/add', 'RoleController@store')->name('role.store');
            Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit')->middleware('can:role-edit');
            Route::post('/update/{id}', 'RoleController@update')->name('role.update');
            Route::get('/delete/{id}', 'RoleController@destroy')->name('role.delete')->middleware('can:role-delete');
            Route::get('/show/{id}', 'RoleController@show')->name('role.show');
        });
        Route::group(['prefix' => 'class','middleware' => 'can:class-list'], function () {
            Route::get('/list', 'ClassController@index')->name('class.list');
            Route::get('/create', 'ClassController@create')->name('class.create')->middleware('can:class-create');
            Route::post('/add', 'ClassController@store')->name('class.store');
            Route::get('/edit/{id}', 'ClassController@edit')->name('class.edit')->middleware('can:class-edit');
            Route::post('/update/{id}', 'ClassController@update')->name('class.update');
            Route::get('/delete/{id}', 'ClassController@destroy')->name('class.delete')->middleware('can:class-delete');
            Route::get('/show/{id}', 'ClassController@show')->name('class.show')->middleware('can:student-list');
            Route::group(['prefix' => 'students'], function () {
                Route::get('/info/{id}', 'StudentController@show')->name('students.show')->middleware('can:student-show');
                Route::get('/edit/{id}', 'StudentController@edit')->name('students.edit')->middleware('can:student-edit');
                Route::post('/update/{id}', 'StudentController@update')->name('students.update');
            });
        });
        Route::group(['prefix' => 'semester'], function () {
            Route::get('/list', 'SemesterController@index')->name('semester.list');
            Route::get('/create', 'SemesterController@create')->name('semester.create');
            Route::post('/add', 'SemesterController@store')->name('semester.store');
            Route::get('/edit/{id}', 'SemesterController@edit')->name('semester.edit');
            Route::post('/update/{id}', 'SemesterController@update')->name('semester.update');
            Route::get('/delete/{id}', 'SemesterController@destroy')->name('semester.delete');
            Route::get('/show/{id}', 'SemesterController@show')->name('semester.show');
        });
    });
});

Route::group(['prefix' => 'site'], function () {
    Route::get('/index', 'SiteController@index')->name('site.index');
    Route::get('/search', 'SiteController@search')->name('site.search')->middleware('can:documents-search');
    Route::get('/category', 'SiteController@category')->name('site.category');
    Route::get('/show-category/{id}', 'SiteController@showCategory')->name('site.category.show');
    Route::get('/show-document/{id}', 'SiteController@showDocument')->name('site.document.show');
    Route::get('/read-document/{id}', 'SiteController@readDocument')->name('site.document.read');
    Route::get('/upload-document', 'SiteController@createDocument')->name('site.document.upload')->middleware('can:documents-create');
    Route::post('/store', 'SiteController@store')->name('site.document.store');
    Route::get('/profile', 'SiteController@show')->name('site.profile');
    Route::get('/profile/edit', 'SiteController@edit')->name('site.profile.edit');
    Route::post('/profile/update', 'SiteController@update')->name('site.profile.update');
    Route::get('/profile/resetPassword', 'SiteController@showResetPasswordForm')->name('site.profile.resetPassword');
    Route::post('/profile/updatePassword', 'SiteController@updatePassword')->name('site.profile.updatePassword');
});

Route::get('/index', function () {
    return view('site.index');
})->name('intro');
