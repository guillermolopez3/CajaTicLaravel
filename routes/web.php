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

Route::get('/', 'MainController@home');

Route::resource('posts','PostsController');
/*
genera las siguientes rutas:
GET /posts => apunta a index, que muestra todos los post
POST /posts => apunta a store, que guarda nuevos post
GET  /posts/create => muestra el formulario para crear
GET  /posts/:id => muestra un post segun su id
GET  /posts/:id/edit => form de edicion
PUT/PATCH /posts/:id => actualiza el post

DELETE /posts/:id => elimina el post
*/

Route::get('/api/posts/getPostsSeccion','ApiPostsController@getAllPostForSection');

Route::get('/api/posts/getPostsSearch','ApiPostsController@getPostForSearchMenu');

Route::get('/api/posts/getPostsLevel','ApiPostsController@getAllPostForEspacioDidactico');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
