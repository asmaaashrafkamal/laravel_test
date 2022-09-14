<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' =>'App\Http\Controllers\Album'], function () {
    #####################################create a new album###########################################################
    Route::get('createAlbum','AlbumController@create1');
    Route::post('multiuploads','AlbumController@uploadSubmit')->name('offers.store2');
    #####################################Show all albums with pictures###########################################################
    Route::get('alldata','AlbumController@allAlbum')->name('all');
    #####################################Delete album with Pictures###########################################################
    Route::get('DeleteAlbums/{album_id}','AlbumController@deleteAlbum') -> name('album.delete');
    #####################################Delete album with Pictures###########################################################
    Route::get('deleteAlbumWithPictures/{album_id}','AlbumController@deleteAlbumWithPictures') -> name('album.picture.delete');
    #####################################update photos in specific album###########################################################
    Route::get('edit/{id}', 'AlbumController@editAlbum');
    Route::post('update/{id}', 'AlbumController@update')->name('offers.update');
    #####################################Move Photo To Another Album And Delete Album##############################################
    Route::get('change/{id}', 'AlbumController@changeForm');
    Route::post('deleteAndChangeAlbum/{old_album_id}', 'AlbumController@deleteAndChangeAlbum')->name('change.delete');
});


