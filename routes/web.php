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

Route::get('/', function(){
    // return redirect('admin');
    return view('welcome');
});

// Route::get('admin', function(){
//     return view('admin.index');
// });


Route::get('admin', function(){
    return view('admin.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/posts/editar', 'PostController@editar');

// Route::group(['middleware' => 'Admin'], function(){
    Route::resource('admin/perfil', 'PerfilController');
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'PostController');
    Route::resource('admin/categoria', 'CategoriaController');
    Route::resource('admin/photo', 'PhotoController');
    
    Route::delete('admin/users/del-foto/{id}', 'AdminUsersController@deletaFoto');

    Route::get('/admin/teste', function(){
        // dd("ola mundo");
        $categoria = \App\Categoria::with('posts')->where('id', '2')->first();
        $meusPosts = $categoria->posts->all();
        foreach($meusPosts as $mPost){
            var_dump($mPost->titulo);
        }
    });
// });



