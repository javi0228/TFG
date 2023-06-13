<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Ruta de historial médico
    Route::get('/medicalHistory', function(){
        return view('dashboard',['livewire_component'=>'medical-history','title'=>__('Medical History')]);
    })->name('medicalHistory');

    // Ruta de hospitales
    Route::get('/hospitals', function(){
        return view('dashboard',['livewire_component'=>'hospitals','title'=>__('Hospitals')]);
    })->name('hospitals');

    // Ruta de mi médico
    Route::get('/myDoctor', function(){
        return view('dashboard',['livewire_component'=>'my-doctor','title'=>__('My Doctor')]);
    })->name('doctor');

    // Ruta de citas
    Route::get('/appointments', function(){
        return view('dashboard',['livewire_component'=>'appointments','title'=>__('Appointments')]);
    })->name('appointments');
});

require __DIR__.'/auth.php';
