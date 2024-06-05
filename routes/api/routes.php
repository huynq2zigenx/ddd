<?php

declare(strict_types=1);

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return new UserResource(resource: $request->user());
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function(): void {
    Route::prefix('contacts')->as('contacts:')->group(base_path('routes/api/contacts.php'));
});

Route::prefix('auth')->as('auth:')->group(base_path(path:'routes/api/auth.php'));
