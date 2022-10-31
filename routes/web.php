<?php

use fara\livewirecalendarjalali\AddEvent;
use fara\livewirecalendarjalali\CalendarAdmin;
use fara\livewirecalendarjalali\CalendarUser;
use Illuminate\Support\Facades\Route;

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

Route::get('/calendarAdmin',CalendarAdmin::class)->name('calendarAdmin');
Route::get('/calendarAdmin/add_event/{timestamp}',AddEvent::class)->name('addEvent');
Route::get('/calendarUser',CalendarUser::class)->name('calendarUser');
