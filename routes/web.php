<?php

use App\Http\Livewire\LoginPage;
use App\Http\Livewire\SignupPage;
use App\Http\Livewire\DashboardPage;
use App\Http\Livewire\DashboardTable;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\RegistrationPage;
use App\Http\Livewire\PersonalDetailPage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/login', LoginPage::class)->name('login');

Route::get('/signup', SignupPage::class)->name('signup');

Route::middleware('auth')->get('/', PersonalDetailPage::class);

Route::middleware('auth')->get('/dashboard', DashboardTable::class);


Route::get('/register', RegistrationPage::class);

Route::view('/powergrid', 'powergrid-demo');