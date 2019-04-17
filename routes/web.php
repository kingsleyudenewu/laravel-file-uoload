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



Route::get('/', 'FileUploadController@index')->name('upload.index');
Route::get('/all_uploads', 'FileUploadController@all_uploads')->name('all_uploads');
Route::post('/csv_download', 'FileUploadController@csv_download')->name('csv.download');
Route::post('/pdf_download', 'FileUploadController@pdf_download')->name('pdf.download');
Route::post('/', 'FileUploadController@store')->name('upload.store');

Route::get('/downloadPDF','FileUploadController@downloadPDF');
