<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool Routes
|--------------------------------------------------------------------------
|
| Here is where you may register Inertia routes for your tool. These are
| loaded by the ServiceProvider of the tool. The routes are protected
| by your tool's "Authorize" middleware by default. Now - go build!
|
*/

Route::get('/', [\Sergeich5\NovaLogViewer\Http\Controllers\LogsController::class, 'index']);
Route::get('/{date}', [\Sergeich5\NovaLogViewer\Http\Controllers\LogsController::class, 'show']);
