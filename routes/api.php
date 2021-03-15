<?php

use App\Http\Controllers\Api\ContactApiController;
use App\Http\Controllers\Api\AllergiesApiController;
use App\Http\Controllers\Api\BodyPartsApiController;
use App\Http\Controllers\Api\DietApiController;
use App\Http\Controllers\Api\DiseasesApiController;
use App\Http\Controllers\Api\DisordersApiController;
use App\Http\Controllers\Api\FamilyHistoryApiController;
use App\Http\Controllers\Api\HabitsApiController;
use App\Http\Controllers\Api\ImmunizationApiController;
use App\Http\Controllers\Api\MedicationsApiController;
use App\Http\Controllers\Api\ObstetricApiController;
use App\Http\Controllers\Api\SurgeriesApiController;
use App\Http\Controllers\Api\TestsApiController;
use App\Http\Controllers\Api\VisitHistoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientsApiController;
use App\Http\Controllers\Api\PatientsBodyPartsController;
use App\Http\Controllers\Api\ProceduresApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'api'],function($router){

    Route::get('/getPatients', [PatientsApiController::class, 'index']);
    Route::get('/getPatients/{id}',[PatientsApiController::class, 'show']);

    Route::get('/getAllContact',[ContactApiController::class,'index']);
    Route::get('/getcontact/{id}',[ContactApiController::class,'contactinfo']);

    Route::get('/getAllergies',[AllergiesApiController::class,'getAllergies']);
    Route::get('/getAllergies/{id}',[AllergiesApiController::class,'getAllergy']);

    Route::get('/getDiet',[DietApiController::class,'getDiets']);
    Route::get('/getDiet/{id}',[DietApiController::class,'getDiet']);

    Route::get('/getDiseases',[DiseasesApiController::class,'getDieseases']);
    Route::get('/getDiseases/{id}',[DiseasesApiController::class,'getDisease']);

    Route::get('/getDisorders',[DisordersApiController::class,'getDisorders']);
    Route::get('/getDisorders/{id}',[DisordersApiController::class,'getDisorder']);

    Route::get('/getFamilyHistory',[FamilyHistoryApiController::class,'getFamilyHistories']);
    Route::get('/getFamilyHistory/{id}',[FamilyHistoryApiController::class,'getFamilyHistory']);

    Route::get('/getHabit',[HabitsApiController::class,'getHabits']);
    Route::get('/getHabit/{id}',[HabitsApiController::class,'getHabit']);

    Route::get('/getImmunizations',[ImmunizationApiController::class,'getImmunizations']);
    Route::get('/getImmunizations/{id}',[ImmunizationApiController::class,'getImmunization']);

    Route::get('/getMedications',[MedicationsApiController::class,'getMedications']);
    Route::get('/getMedications/{id}',[MedicationsApiController::class,'getMedication']);

    Route::get('/getObstetrics',[ObstetricApiController::class,'getObstetrics']);
    Route::get('/getObstetrics/{id}',[ObstetricApiController::class,'getObstetric']);

    Route::get('/getSurgeries',[SurgeriesApiController::class,'getSurgeries']);
    Route::get('/getSurgeries/{id}',[SurgeriesApiController::class,'getSurgery']);

    Route::get('/getTests',[TestsApiController::class,'getTests']);
    Route::get('/getTests/{id}',[TestsApiController::class,'getTest']);

    Route::get('/getVisitHistories',[VisitHistoryApiController::class,'getVisitHistories']);
    Route::get('/getVisitHistories/{id}',[VisitHistoryApiController::class,'getVisitHistory']);

    Route::get('/getPatientsBodyParts',[PatientsBodyPartsController::class,'getbodyparts']);
    Route::get('/getPatientsBodyParts/{id}',[PatientsBodyPartsController::class,'getbodypart']);

    Route::get('/getProcedures',[ProceduresApiController::class,'getProcedures']);
    Route::get('/getProcedures/{id}',[ProceduresApiController::class,'getProcedure']);

    Route::get('/getBodyParts',[BodyPartsApiController::class,'getBodyParts']);
    Route::get('/getBodyParts/{id}',[BodyPartsApiController::class,'getBodyPart']);
});
