<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Contacts;

Route::get('/', Contacts\IndexController::class)->name('index');