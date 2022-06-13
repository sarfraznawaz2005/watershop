<?php

use Modules\Main\Http\Actions\Home\IndexHome;

Route::group(['middleware' => ['auth', 'verified']], static function () {
    Route::get('{url}', '\\' .IndexHome::class)->where(['url' => '/|home|'])->name('home');
});

