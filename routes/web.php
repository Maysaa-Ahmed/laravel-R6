<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;

Route::get('', function () {
    return view('welcome');

});
// Route::get('w', function () {
//      return 'welcome Laravel!!';
// });
// Route::get('cars/{id}', function ($id) {
//     return 'car number is ' . $id;
// });
// Route::get('user/{name}/{age}', function($name, $age){
//     return "Username is " . $name . " and age is " . $age;
// })->whereAlpha('name')->whereNumber('age');

// Route::get('car/{name}', function($name){
//     return "name is " . $name;
// })->whereIn('name', ['Nour', 'Maysaa']);

// //Prefix Group

// Route::prefix('company')->group(function() {

//     Route::get('', function(){
//         return "Company Index";
//     });

//     Route::get('IT', function(){
//         return "Company IT";
//     });

//     Route::get('users', function(){
//         return "Company users";
//     });
 
// }); 


//Prefix Group task accounts

Route::prefix('accounts')->group(function() {

    Route::get('', function(){
        return "accounts Index";
    });

    Route::get('admin', function(){
        return "accounts admin";
    });

    Route::get('user', function(){
        return "accounts user";
    });
 
}); 

//Prefix Group task cars

Route::prefix('cars')->group(function () {
    Route::get('/', function () {
        return "cars Index";
    });

    Route::prefix('usa')->group(function () {

        Route::get('', function(){
            return "usa Index";
        });

        Route::get('ford', function () { 
            return "/cars/usa/ford";
        });

        Route::get('tesla', function () {
            return "/cars/usa/tesla";
        });
    });

    Route::prefix('ger')->group(function () {

        Route::get('', function(){
            return "ger Index";
        });

        Route::get('mercedes', function () {
           
            return "/cars/ger/mercedes";
        });

        Route::get('audi', function () {
            
            return "/cars/ger/audi";
        });

        Route::get('volkswagen', function () {
           
            return "/cars/ger/volkswagen";
        });
    });
});


//session3
Route::get('cv', function () {
    return view('cv');

});

//name
Route::get('link', function () {
    $url = route('w');
    return "<a href='$url'>GO TO WELCOME</a>";

});
Route::get('welcome', function () {
    return 'welcome page';

})->name('w');

//login
Route::get('login', function () {
    return view('login');

});

Route::post('data', function () {
    return 'data inserted successeful';
})->name('data');

//task3:
Route::get('task3', function () {
    return view('task3');

});

// Route::post('task3data', function () {
//     return 'task 3 data inserted successeful';
// })->name('task3data');

Route::post('task3data', function (Request $request) {
    $name = $request->input('name');
    $email = $request->input('email');

    return view('task3data', compact('name', 'email'));
})->name('task3data');

//session 4
//schema
// to create new db table commands:
// php artisan make:migration create_cars_table
// php artisan migrate

//php artisan list => to view all commands



Route::get('cars/create', [CarController::class, 'create']);
Route::Post('cars', [CarController::class, 'store'])->name('cars.store');

//classes task4
Route::get('classes/create', [CarController::class, 'create']);
Route::Post('classes', [CarController::class, 'store'])->name('classes.store');

//session 5
Route::get('cars', [CarController::class, 'index']);
Route::get('cars/{id}', [CarController::class, 'edit'])->name('cars.edit');

//Task5
Route::get('classes', [CarController::class, 'index']);
Route::get('classes/{id}', [CarController::class, 'edit'])->name('classes.edit');