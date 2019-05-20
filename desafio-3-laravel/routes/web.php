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


Route::get('/', 'UsuarioController@listarUsuario')->name('lista');

Route::get('/usuarios/cadastro', 'UsuarioController@criarUsuario');

Route::post('/usuarios/cadastro', 'UsuarioController@criarUsuario');

Route::get('/usuarios/atualizar/{id}', 'UsuarioController@atualizarUsuario');

Route::put('/usuarios/atualizar/{id}', 'UsuarioController@atualizarUsuario');

Route::delete('/usuarios/excluir/{id}', 'UsuarioController@deletarUsuario');

