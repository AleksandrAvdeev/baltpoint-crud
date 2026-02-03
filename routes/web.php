<?php

use Illuminate\Support\Facades\Route;

Route::get('', \App\Baltpoint\Users\Http\Actions\GetUsersPage::class)->name('home');
Route::get('register', \App\Baltpoint\Users\Http\Actions\GetRegisterPage::class)->name('register');
Route::post('register', \App\Baltpoint\Users\Http\Actions\Register::class)->name('register.post');
Route::get('{user}/edit', \App\Baltpoint\Users\Http\Actions\GetUpdateUserPage::class)->name('edit');
Route::post('{user}/edit', \App\Baltpoint\Users\Http\Actions\UpdateUser::class)->name('edit.post');
Route::post('{user}/delete', \App\Baltpoint\Users\Http\Actions\DeleteUser::class)->name('delete.post');
