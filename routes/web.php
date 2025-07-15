<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;


Route::get('/', [CrudController::class,'index']);


Route::resource('/post',CrudController::class);

Route::get('/deleted-records', [CrudController::class, 'deletedRecords'])->name('deleted.records');


 Route::post('/post/restore/{id}', [CrudController::class, 'restore'])->name('post.restore');




