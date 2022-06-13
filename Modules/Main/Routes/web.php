<?php

use Illuminate\Support\Facades\Route;
use Modules\Main\Http\Actions\Area\DestroyArea;
use Modules\Main\Http\Actions\Area\EditArea;
use Modules\Main\Http\Actions\Area\IndexArea;
use Modules\Main\Http\Actions\Area\StoreArea;
use Modules\Main\Http\Actions\Area\UpdateArea;
use Modules\Main\Http\Actions\Entry\DestroyEntry;
use Modules\Main\Http\Actions\Entry\DuplicateEntry;
use Modules\Main\Http\Actions\Entry\EditEntry;
use Modules\Main\Http\Actions\Entry\IndexEntry;
use Modules\Main\Http\Actions\Entry\StoreEntry;
use Modules\Main\Http\Actions\Entry\UpdateEntry;
use Modules\Main\Http\Actions\Home\IndexHome;

Route::group(['middleware' => ['auth', 'verified']], static function () {
    Route::get('{url}', '\\' . IndexHome::class)->where(['url' => '/|home|'])->name('home');

    Route::group(['namespace' => '\\'], static function () {
        Route::get('areas', IndexArea::class)->name('areas.index');
        Route::post('areas', StoreArea::class)->name('areas.store');
        Route::get('areas/{area}/edit', EditArea::class)->name('areas.edit');
        Route::put('areas/{area}', UpdateArea::class)->name('areas.update');
        Route::delete('areas/{area}', DestroyArea::class)->name('areas.destroy');
    });

    Route::group(['namespace' => '\\'], static function () {
        Route::get('entries', IndexEntry::class)->name('entries.index');
        Route::post('entries', StoreEntry::class)->name('entries.store');
        Route::get('entries/{entry}/edit', EditEntry::class)->name('entries.edit');
        Route::put('entries/{entry}', UpdateEntry::class)->name('entries.update');
        Route::delete('entries/{entry}', DestroyEntry::class)->name('entries.destroy');
        Route::get('entries/{entry}/duplicate', DuplicateEntry::class)->name('entries.duplicate');
    });
});

