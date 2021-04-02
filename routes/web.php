<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\HabitsController;
use App\Http\Controllers\MedicalRecord\PatientInfoController;
use App\Http\Controllers\MedicalRecord\DHIController;
use App\Http\Controllers\MedicalRecord\IllnessController;
use App\Http\Controllers\MedicalRecord\AppointmentsTestsController;
use App\Http\Controllers\MedicalRecord\SurgeryController;
use App\Http\Controllers\UnityController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('patients','PatientsController');
    Route::get('patients/{patient}',[PatientsController::class,'show'])->name('patients.show');

    Route::resource('contacts','ContactInformationController')->except(['create']);
    Route::get('contacts/create/{patient_id}','ContactInformationController@create')->name('contacts.create');

    Route::resource('diets','DietController')->except(['create']);
    Route::get('diets/create/{patient_id}','DietController@create')->name('diets.create');

    Route::resource('habits','HabitsController')->except(['create']);
    Route::get('habits/create/{patient_id}','HabitsController@create')->name('habits.create');

    Route::resource('immunizations', 'ImmunizationController')->except(['create']);
    Route::get('immunizations/create/{patient_id}','ImmunizationController@create')->name('immunizations.create');

    Route::resource('familyHistory', 'FamilyHistoryController')->except(['create']);
    Route::get('familyHistory/create/{patient_id}','FamilyHistoryController@create')->name('familyHistory.create');


    Route::resource('diseases', 'DiseasesController')->except(['create']);
    Route::get('diseases/create/{patient_id}','DiseasesController@create')->name('diseases.create');

    Route::resource('allergies', 'AllergiesController')->except(['create']);
    Route::get('allergies/create/{patient_id}','AllergiesController@create')->name('allergies.create');

    Route::resource('disorders', 'DisordersController')->except(['create']);
    Route::get('disorders/create/{patient_id}','DisordersController@create')->name('disorders.create');
    Route::post('icdcode/create/{patient_id}/fetch','DisordersController@fetch')->name('disorders_icd.fetch');

    Route::resource('visit-history','VisitHistoryController')->except(['create']);
    Route::get('visit-history/create/{patient_id}','VisitHistoryController@create')->name('visit-history.create');

    Route::resource('tests','TestsController')->except(['create']);
    Route::get('tests/create/{patient_id}','TestsController@create')->name('tests.create');

    Route::resource('medications','MedicationsController')->except(['create']);
    Route::get('medications/create/{patient_id}','MedicationsController@create')->name('medications.create');

    Route::resource('surgeries','SurgeriesController')->except(['create']);
    Route::get('surgeries/create/{patient_id}','SurgeriesController@create')->name('surgeries.create');

    Route::resource('obstetric','ObstetricController')->except(['create','index']);
    Route::get('obstetric/create/{patient_id}','ObstetricController@create')->name('obstetric.create');

    Route::get('medicalRecord/UnityWebGL/{patient}', [UnityController::class,'index'])->name('unity.index');

    //Medical Record Page
    Route::get('medicalRecord/patient-info/{patient}',[PatientInfoController::class,'show'])->name('patient-info.show');
    Route::get('medicalRecord/dhi/{patient}',[DHIController::class,'show'])->name('dhi.show');
    Route::get('medicalRecord/illness/{patient}',[IllnessController::class, 'show'])->name('illness.show');
    Route::get('medicalRecord/doctor-appointmets-and-tests/{patient}',[AppointmentsTestsController::class, 'show'])->name('appointments-tests.show');
    Route::get('medicalRecord/patient-surgery/{patient}',[SurgeryController::class, 'show'])->name('patient-surgery.show');;
    Route::get('medicalRecord/obstetric/{patient_id}','ObstetricController@index')->name('obstetric.index');

});
