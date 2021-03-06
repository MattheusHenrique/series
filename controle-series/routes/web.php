<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;


Route::get('/series', 'SeriesController@index')
    ->name("listar_series");
Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar_serie');
Route::post('/series/criar', 'SeriesController@store');
Route::delete('/series/remover/{id}', 'SeriesController@destroy');

Route::get('/series/{seriesId}/temporadas', 'TemporadasController@index');


Route::fallback(function () {
    echo "aqui não";
});