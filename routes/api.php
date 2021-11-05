<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Models\LicensePlates;
Use App\Models\Availabilities;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::group(['middleware' => 'admin'], function () {
        
        //wyświetlenie wszystkich terminów
        Route::get('admin/availabilities', function() { 
            return Availabilities::all();
        });
        
        //wyświetlenie zajętych terminów
        Route::get('admin/availabilities/busy', function() {
            return Availabilities::where("status", 1)->get();
        });
        
        //wyświetlenie pojedynczego terminu
        Route::get('admin/availabilities/{id}', function($id) {
            return Availabilities::find($id);
        });
        
        //dodawanie nowego terminu
        Route::post('admin/availabilities', function(Request $request) {
            return Availabilities::create($request->all());
        });
        
        //usuwanie terminu
        Route::delete('admin/availabilities/{id}', function($id) {
            Availabilities::find($id)->delete();

            return "ok";
        });

    });



    //wyświetl wolne terminy 
    Route::get('availabilities/free', function() {
        return Availabilities::where("status", 0)->get();
    });
    
    //zapisz się na wybrany termin
    Route::post('availabilities/new/{id}', function(Request $request,$id) { echo $id; die();
        $availabilities=Availabilities::where("id",$id)->where("status",0)->first();
        if($availabilities) {
            Availabilities::whereId($id)->update(['status' => 1]);
            return LicensePlates::create(['name' => $request->name, 'date_id' => $id ]);
        } else {
           return \Response::json(['error' => 'Tablica rejestracyjna już istnieje w bazie']);
        }
    });
    
    // zapisz się na pierwszy wolny termin
    Route::post('availabilities/first', function(Request $request) {
        $availabilitie=Availabilities::where("status",0)->first();
        if($availabilitie) {
            Availabilities::whereId($availabilitie->id)->update(['status' => 1]);
            return LicensePlates::create(['name' => $request->name, 'date_id' => $availabilitie->id ]);
        } else {
           return \Response::json(['error' => 'Brak wolnych terminów']);
        }
    });
    
    //zwolnij termin
    Route::delete('availabilities/{id}', function($id) {
        $licensePlate=LicensePlates::find($id);
        if($licensePlate) {
            Availabilities::whereId($licensePlate->date_id)->update(['status' => 0]);
            LicensePlates::find($id)->delete();

            return "ok";
        } else {
            return "Brak";
        }
    });
