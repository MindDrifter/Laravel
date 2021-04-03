<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\UserCardsController;
use App\Http\Requests\CreateCardRequest;


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


//Routes
Route::get('/user_cards/add_card', function (){
    return view('create_card');
})->name('add_card');

Route::get('/user_cards', function (UserCardsController $userCardsController){
    return $userCardsController->loadUserCards();
})->name('user_cards');


Route::get('/login', function (){
    return view('login');
})->name('login');


Route::get('/register', function (){
    return view('register');
})->name('register');

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/contact', function () {
    return view('contact');
})->name('contact_form');
//-----------------------------------------

//Registration and login
Route::get('/cookie', function (AuthController  $authController){
    return $authController->getCookie();
})->name('logout');


Route::post('/login/success', function (AuthController  $authController ,LoginRequest $request){
    return $authController->loginIn($request);
})->name('login_confirm');


Route::post('/register/success', function (AuthController $authController, AuthRequest $authRequest){
    return $authController->applyRegistration($authRequest);
})->name('register_confirm');
//------------------------


//Cards
Route::get('/user_cards/delete_card{id}', function ($id, UserCardsController $userCardsController){
    return $userCardsController->deleteCard($id);
})->name('delete_card');

Route::post('/user_cards/add_card/confirm', function (CreateCardRequest $createCardRequest, UserCardsController $userCardsController){
    return $userCardsController->createCard($createCardRequest);
})->name('add_card_confirm');


//Messages
Route::get('/contact_messages', function (ContactController $contactController) {
    return $contactController->allData();
})->name('contact_messages');


Route::get('/message{id}', function ($id, ContactController $contactController) {
    return $contactController->getOneMessage($id);
})->name('one_message');


Route::get('contact_messages/{id}', function ($id, ContactController $contactController){
    return $contactController->deleteMessage($id);
})->name('delete_message_yes');


Route::post('/message{id}', function (ContactController $contactController,ContactRequest $request, $id) {
    return $contactController->updateMessage($id, $request);
})->name('one_message_submit');


Route::post('/contact/submit', function (ContactController $contactController, ContactRequest $request){
   return $contactController->submit($request);
})->name('contact_submit');
//-----------------------------------------


