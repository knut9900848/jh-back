<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiV1\Auth\LoginController;
use App\Http\Controllers\ApiV1\Admin\MemberController;
use App\Http\Controllers\ApiV1\Admin\Setting\BranchController;
use App\Http\Controllers\ApiV1\Admin\Setting\BankAccountController;
use App\Http\Controllers\ApiV1\Admin\Setting\CurrencyController;
use App\Http\Controllers\ApiV1\Admin\Setting\UnitController;
use App\Http\Controllers\ApiV1\Admin\Setting\TermsAndConditionsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/admin/members', [MemberController::class, 'index']);
    Route::get('/admin/members/{id}', [MemberController::class, 'show']);
    Route::post('/admin/members', [MemberController::class, 'store']);
    Route::put('/admin/members/{id}', [MemberController::class, 'update']);
    Route::post('/admin/members/{id}/async-roles', [MemberController::class, 'asyncRoles']);
    Route::post('/admin/members/{id}/async-permissions', [MemberController::class, 'asyncPermissions']);

    Route::get('/admin/settings/branches', [BranchController::class, 'index']);
    Route::get('/admin/settings/branches/{id}', [BranchController::class, 'show']);
    Route::post('/admin/settings/branches', [BranchController::class, 'store']);
    Route::put('/admin/settings/branches/{id}', [BranchController::class, 'update']);

    Route::get('/admin/settings/bank-accounts', [BankAccountController::class, 'index']);
    Route::get('/admin/settings/bank-accounts/{id}', [BankAccountController::class, 'show']);
    Route::post('/admin/settings/bank-accounts', [BankAccountController::class, 'store']);
    Route::put('/admin/settings/bank-accounts/{id}', [BankAccountController::class, 'update']);

    Route::get('/admin/settings/currencies', [CurrencyController::class, 'index']);
    Route::get('/admin/settings/currencies/{id}', [CurrencyController::class, 'show']);
    Route::post('/admin/settings/currencies', [CurrencyController::class, 'store']);
    Route::put('/admin/settings/currencies/{id}', [CurrencyController::class, 'update']);

    Route::get('/admin/settings/units', [UnitController::class, 'index']);
    Route::get('/admin/settings/units/{id}', [UnitController::class, 'show']);
    Route::post('/admin/settings/units', [UnitController::class, 'store']);
    Route::put('/admin/settings/units/{id}', [UnitController::class, 'update']);

    Route::get('/admin/settings/terms-and-conditions', [TermsAndConditionsController::class, 'index']);
    Route::get('/admin/settings/terms-and-conditions/{id}', [TermsAndConditionsController::class, 'show']);
    Route::post('/admin/settings/terms-and-conditions', [TermsAndConditionsController::class, 'store']);
    Route::put('/admin/settings/terms-and-conditions/{id}', [TermsAndConditionsController::class, 'update']);
    Route::get('/admin/settings/terms-and-conditions/{id}/download', [TermsAndConditionsController::class, 'download']);
});
