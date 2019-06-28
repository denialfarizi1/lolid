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

Route::get('/', function () {
    return view('welcome');
});

Route::post('hello/send-welcome-email','HelloController@sendWelcomeEmail');
Auth::routes();

Route::get('/home1', 'HomeController@index')->name('home1');
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');

Auth::routes();

Route::get('/home1', 'HomeController@index')->name('home');
Route::get('/home=id', 'HomeController@home_id')->name('home_id');
Route::get('/home', 'UserController@home')->name('home_id');
Route::get('/home=m', 'UserController@homem')->name('home_idm');
Route::get('/home={limit_post}', 'UserController@home_limit')->name('home_id_limit');
Route::get('/mhome={limit_post}', 'UserController@home_limitm')->name('home_id_limitm');
Route::get('/beranda', 'BerandaController@beranda')->name('beranda');
Route::get('/beranda=m', 'BerandaController@berandam')->name('berandam');
Route::get('/beranda={limit_post}', 'BerandaController@beranda_limit')->name('beranda_limit');
Route::get('/mberanda={limit_post}', 'BerandaController@beranda_limitm')->name('beranda_limitm');
Route::get('/@{username}', 'BerandaController@username')->name('user_username');
Route::get('/=@{username}', 'BerandaController@usernamem')->name('user_usernamem');
Route::get('/pencarian', 'BerandaController@pencarian')->name('pencarian_user');
Route::get('/pencarian=m', 'BerandaController@pencarianm')->name('pencarian_userm');
Route::post('/pencarian=m=', 'BerandaController@pencarian_likem')->name('pencarian_user_likem');
Route::post('/pencarian=', 'BerandaController@pencarian_like')->name('pencarian_user_like');
Route::post('/pencarian=text={limit_post}', 'BerandaController@pencarian_like_limit')->name('pencarian_user_like_limit');
Route::post('/pencarian=m=text={limit_post}', 'BerandaController@pencarian_like_limitm')->name('pencarian_user_like_limitm');
Route::get('/grup_tambah', 'GrupController@grup_buat')->name('grup_buat');
Route::get('/mgrup_tambah', 'GrupController@grup_buatm')->name('grup_buatm');
Route::post('/group/save', 'GrupController@grup_buat_save')->name('grup_buat_save');
Route::get('/group_{grupid}', 'GrupController@grup_public')->name('grup_public');
Route::get('/grup_{grupid}', 'GrupController@grup_publicm')->name('grup_publicm');
Route::post('group/status/save', 'GrupController@post_grup_public_user_save')->name('post_grup_public_user_save');

Route::post('/group/anggota/save', 'GrupController@grup_anggota_save')->name('grup_anggota_save');
Route::post('/group/anggota/delete', 'GrupController@grup_anggota_delete')->name('grup_anggota_delete');
Route::post('/grup_public_comment/save', 'GrupController@grup_public_comment_post_save')->name('grup_public_comment_post_save');
Route::post('/grup_public_like/save', 'GrupController@grup_public_like_post')->name('grup_public_like_post_save');
Route::post('like_grup/delete/{id}', 'GrupController@grup_public_like_delete')->name('like_grup_post_delete');

Route::get('/post_{id}', 'UserController@post_detail')->name('post_detail');
Route::get('/post=m_{id}', 'UserController@post_detailm')->name('post_detailm');
Route::post('post/save', 'UserController@store')->name('post_save');
Route::post('post/update', 'UserController@post_update')->name('post_update');
Route::post('post/delete', 'UserController@post_delete')->name('post_delete');

Route::get('image_post/view/{fileImage}', 'UserController@view_image_post')->name('image_post_view');

Route::post('like/save', 'UserController@like_post')->name('like_post_save');
Route::post('like_id/save', 'UserController@like_post_id')->name('like_post_id_save');
Route::post('like/delete/{id}', 'UserController@like_post_delete')->name('like_post_delete');
Route::post('like_id/delete/{id}', 'UserController@like_post_id_delete')->name('like_post_id_delete');

Route::post('comment/save', 'UserController@comment_post')->name('comment_post_save');
Route::post('comment_id/save', 'UserController@comment_post_id')->name('comment_post_id_save');
Route::post('comment_id/delete/{id}', 'UserController@comment_id_delete')->name('comment_post_id_delete');

Route::get('/produk_home', 'UserController@produkhome')->name('produk_home');
Route::get('/profil', 'UserController@profil')->name('profil_user');
Route::get('/profil=m', 'UserController@profilm')->name('profil_userm');
Route::get('/edit_profil', 'UserController@edit_profil')->name('edit_profil_user');
Route::post('/user/update', 'UserController@update_profil')->name('update_user');
Route::get('image_user/view/{fileImage}', 'UserController@view_image_user')->name('image_user_view');
Route::get('/catatan_tambah', 'UserController@catatan_tambah')->name('catatan_tambah');
Route::get('/mcatatan_tambah', 'UserController@catatan_tambahm')->name('catatan_tambahm');
Route::post('catatan/save', 'UserController@catatan_save')->name('catatan_save');
Route::post('rating/save', 'UserController@rating')->name('rating_save');

Route::get('/message', 'UserController@message')->name('message_user');
Route::get('/message=m', 'UserController@messagem')->name('message_userm');
Route::post('/message/save', 'UserController@message_save')->name('message_save');
Route::get('/message_{message_id}', 'UserController@message_chat')->name('message_chat');
Route::get('/mmessage_{message_id}', 'UserController@message_chatm')->name('message_chatm');
Route::post('message_chat/save', 'UserController@message_chat_save')->name('message_chat_save');

Route::post('/follow/save', 'UserController@follow_save')->name('follow_save');
Route::post('/follow/delete', 'UserController@follow_delete')->name('follow_delete');


Route::get('/master', 'ProdukController@master')->name('master_produk');
Route::get('/produk', 'ProdukController@index')->name('produk');
Route::get('/produk=m', 'ProdukController@indexm')->name('produkm');
Route::get('/produk={limit_barang}', 'ProdukController@produk_limit_tambah')->name('produk_limit_tambah');
Route::get('/mproduk={limit_barang}', 'ProdukController@produk_limit_tambahm')->name('produk_limit_tambahm');
Route::get('/alat_rumah_tangga', 'ProdukController@index_alat_rumah_tangga')->name('produk_alat_rumah_tangga');
Route::post('/Alat_Rumah_Tangga={limit_barang}', 'ProdukController@index_alat_rumah_tangga_limit')->name('produk_alat_rumah_tangga_limit');
Route::get('/buku', 'ProdukController@index_buku')->name('produk_buku');
Route::post('/Buku={limit_barang}', 'ProdukController@index_buku_limit')->name('produk_buku_limit');
Route::get('/elektronik', 'ProdukController@index_elektronik')->name('produk_elektronik');
Route::post('/Elektronik={limit_barang}', 'ProdukController@index_elektronik_limit')->name('produk_elektronik_limit');
Route::get('/hewan', 'ProdukController@index_hewan')->name('produk_hewan');
Route::post('/Hewan={limit_barang}', 'ProdukController@index_hewan_limit')->name('produk_hewan_limit');
Route::get('/hiburan', 'ProdukController@index_hiburan')->name('produk_hiburan');
Route::post('/Hiburan={limit_barang}', 'ProdukController@index_hiburan_limit')->name('produk_hiburan_limit');
Route::get('/jasa', 'ProdukController@index_jasa')->name('produk_jasa');
Route::post('/Jasa={limit_barang}', 'ProdukController@index_jasa_limit')->name('produk_jasa_limit');
Route::get('/kesehatan', 'ProdukController@index_kesehatan')->name('produk_kesehatan');
Route::post('/Kesehatan={limit_barang}', 'ProdukController@index_kesehatan_limit')->name('produk_kesehatan_limit');
Route::get('/makanan', 'ProdukController@index_makanan')->name('produk_makanan');
Route::post('/Makanan={limit_barang}', 'ProdukController@index_makanan_limit')->name('produk_makanan_limit');
Route::get('/olahraga', 'ProdukController@index_olahraga')->name('produk_olahraga');
Route::post('/Olahraga={limit_barang}', 'ProdukController@index_olahraga_limit')->name('produk_olahraga_limit');
Route::get('/pakaian', 'ProdukController@index_pakaian')->name('produk_pakaian');
Route::post('/Pakaian={limit_barang}', 'ProdukController@index_pakaian_limit')->name('produk_pakaian_limit');
Route::get('/tempat', 'ProdukController@index_tempat')->name('produk_tempat');
Route::post('/Tempat={limit_barang}', 'ProdukController@index_tempat_limit')->name('produk_tempat_limit');

Route::get('/lain', 'ProdukController@index_lain_lain')->name('produk_lain_lain');
Route::post('/Lain-Lain={limit_barang}', 'ProdukController@index_lain_lain_limit')->name('produk_lain_lain_limit');
Route::post('/cari_barang', 'ProdukController@cari_barang')->name('cari_barang');
Route::post('/cari_barang=m', 'ProdukController@cari_barangm')->name('cari_barangm');
Route::post('/cari_barang={limit_barang}', 'ProdukController@cari_barang_limit')->name('cari_barang_limit');
Route::post('/mcari_barang={limit_barang}', 'ProdukController@cari_barang_limitm')->name('cari_barang_limitm');



Route::get('/produk_{id}', 'ProdukController@detail')->name('list_produk');
Route::get('/mproduk_{id}', 'ProdukController@detailm')->name('list_produkm');
//Route::get('/cart_produk_{id}', 'ProdukController@cart')->name('cart_produk');
Route::get('/tambah_produk', 'ProdukController@tambah')->name('tambah_produk');
Route::get('/tambah_produk=m', 'ProdukController@tambahm')->name('tambah_produkm');
Route::post('produk/save', 'ProdukController@store')->name('produk_save');
Route::get('/user_produk', 'ProdukController@user_produk_post')->name('user_produk_post');
Route::get('/user_produk=m', 'ProdukController@user_produk_postm')->name('user_produk_postm');
Route::get('/edit_produk_{id}', 'ProdukController@edit')->name('edit_produk_user');
Route::get('/medit_produk_{id}', 'ProdukController@editm')->name('edit_produk_userm');
Route::post('/produk/update/{id}', 'ProdukController@update')->name('update_produk_user');
Route::get('image/view/{fileImage}', 'ProdukController@viewImage')->name('image_view');
Route::post('/produk/hapus/{id}','ProdukController@hapus')->name('hapus_produk');
Route::post('/user_produk_hapus','ProdukController@hapus_back')->name('hapus_back_produk');
Route::post('comment_produk/save', 'ProdukController@comment_produk_save')->name('comment_produk_save');


Route::post('/cart_produk/save', 'CartController@store')->name('cart_save');
Route::get('/cart_produk', 'CartController@cart_detail')->name('cart_produk');
Route::get('/mcart_produk', 'CartController@cart_detailm')->name('cart_produkm');
Route::get('/edit_cart_produk', 'CartController@edit')->name('edit_cart_produk');
Route::get('/medit_cart_produk', 'CartController@editm')->name('edit_cart_produkm');
Route::post('/cart_produk/update', 'CartController@update')->name('update_cart_produk');
Route::post('/cart_produk/hapus/{id}', 'CartController@hapus')->name('hapus_cart_produk');