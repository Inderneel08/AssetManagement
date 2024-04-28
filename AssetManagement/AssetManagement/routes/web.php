<?php

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CaptchaServiceController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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




// Route::get('/login',[LoginController::class])
// Route::post('/login',[TestController::class,'index'])->name('login');




Route::middleware(['revalidate','accessToBoth'])->group(function(){
    
    Route::get('/home/allIssues/{id}',[HomeController::class,'describe'])->name('describe');

    Route::get('/home',function(){

        $desptopCount   = Asset::where('asset_type','Desktop')->where('delete_flag','=',0)->count();
        $printerCount   = Asset::where('asset_type','Printer')->where('delete_flag','=',0)->count();
        $laptopCount    = Asset::where('asset_type','Laptop')->where('delete_flag','=',0)->count();
        $switchCount    = Asset::where('asset_type','Switch')->where('delete_flag','=',0)->count();
        $firewallCount  = Asset::where('asset_type','Firewall')->where('delete_flag','=',0)->count();
        $epabxCount     = Asset::where('asset_type','EPABX')->where('delete_flag','=',0)->count();
        $vcSystemCount  = Asset::where('asset_type','VC System')->where('delete_flag','=',0)->count();
        $HardDiskCount  = Asset::where('asset_type','HardDisk')->where('delete_flag','=',0)->count();
        $role           = Session::get('role');

        $issuesResolved = DB::table('issues')->where('status','=',0)->where('delete_flag','=',0)->count();

        $issuesUnResolved = DB::table('issues')->where('status','!=',0)->where('delete_flag','=',0)->count();

        $chart1 = new Chart;

        $chart1->labels(['Desktop','Printer', 'Laptop','Switch','Firewall','EPABX','VC System','HardDisk'])
            ->dataset('Asset Types', 'pie', [$desptopCount, $printerCount, $laptopCount,$switchCount,$firewallCount,$epabxCount,$vcSystemCount,$HardDiskCount])
            ->options([
                'responsive' => true,
                'maintainAspectRatio' => false,
            ])
            ->backgroundColor(['#FF0000', '#000000', '#FFA500','#0000ff','#008000','#FFA500','#Ffc0cb','#7f00ff']);
        
        $chart2 = new Chart;

        $chart2->labels(['Resolved','Pending'])
                ->dataset('Issue Types','pie',[$issuesResolved,$issuesUnResolved])
            ->options([
                'responsive' => true,
                'maintainAspectRatio' => false,
            ])
            ->backgroundColor(['#87CEEB','#FF0000']);

        return view('home',compact('chart1','chart2'),['role'=>$role]);
    })->name('home');

    Route::get('/home/changePassword',[HomeController::class,'changePassword'])->name('changePassword');

    Route::post('/home/savePassword',[HomeController::class,'savePassword'])->name('savePassword');

    Route::post('/logout',[UserController::class,'logout'])->name('logout');
});


Route::middleware(['guest'])->group(function(){
    Route::get('/', function () {
        return view('login.login');
    })->name('toLogin');
    
    Route::get('/reload-captcha',[CaptchaServiceController::class,'reloadCaptcha'])->name('reload-captcha');
});



Route::middleware(['guest','revalidate'])->group(function(){
    
    Route::post('/login',[UserController::class,'attemptLogin'])->name('login');

});


Route::middleware(['revalidate','authenticateUser'])->group(function(){
    Route::get('/home/raise_request',[HomeController::class,'raise_request'])->name('raise_request');

    Route::get('/home/raise_request/create_new_query',[HomeController::class,'create_new_query'])->name('create_new_query');

    Route::get('/home/getIssues',[HomeController::class,'getIssues'])->name('getIssues');

    Route::post('/home/allIssues/delete/',[HomeController::class,'delete_issues'])->name('delete_issues');

    Route::post('/home/create_issue',[HomeController::class,'create_issue'])->name('create_issue');

    Route::post('/home/saveText',[HomeController::class,'updateDescription'])->name('updateDescription');

    Route::post('/escalate',[HomeController::class,'escalate_request'])->name('escalate_request');

    Route::get('/downloadSpecificIssues',[HomeController::class,'exportIssueForSpecificUser'])->name('exportIssueForSpecificUser');
});

Route::middleware(['revalidate','authenticateAdmin'])->group(function(){

    Route::get('/home/list_assets',[HomeController::class,'list_assets'])->name('list_assets');

    Route::get('/home/users',[HomeController::class,'list_users'])->name('list_users');

    Route::get('/home/consumables',[HomeController::class,'list_consumables'])->name('list_consumables');

    Route::get('/home/list_assets/create_assets',[HomeController::class,'create_assets'])->name('create_assets');

    Route::get('/export-assets',[HomeController::class,'exportAssets'])->name('exportAssets');

    Route::get('/export-consumables',[HomeController::class,'exportConsumables'])->name('exportConsumables');

    Route::get('/home/getUsers',[HomeController::class,'getUsers'])->name('getUsers');

    Route::get('/home/getAssets',[HomeController::class,'getAssets'])->name('getAssets');

    Route::get('/home/getConsumables',[HomeController::class,'getConsumables'])->name('getConsumables');

    Route::post('/home/assets/delete',[HomeController::class,'deleteAssets'])->name('deleteAssets');

    Route::post('/home/list_assets/changeStatusOfAsset',[HomeController::class,'changeStatusOfAsset'])->name('changeStatusOfAsset');

    Route::post('/home/assets/assign',[HomeController::class,'assignTo'])->name('assignTo');

    Route::get('/home/allIssues',[HomeController::class,'allIssues'])->name('allIssues');

    Route::get('/home/users/create_users',[HomeController::class,'create_users'])->name('create_users');

    Route::get('/export-users',[HomeController::class,'exportUsers'])->name('exportUsers');

    Route::post('/home/users/changeStatus',[HomeController::class,'changeStatus'])->name('changeStatus');

    Route::post('/home/users/changeRole',[HomeController::class,'changeRole'])->name('changeRole');

    Route::post('/home/users/delete',[HomeController::class,'delete'])->name('delete');

    Route::get('/fetchAssetId',[HomeController::class,'fetch'])->name('fetch');

    Route::get('/home/show_issues',[HomeController::class,'show_issues'])->name('show_issues');

    Route::post('/home/close_request',[HomeController::class,'close_request'])->name('close_request');

    Route::post('/home/start_request',[HomeController::class,'start_request'])->name('start_request');

    Route::get('/home/assets/edit/{id}',[HomeController::class,'editAssets'])->name('edit_assets');

    Route::post('/home/users/editAsset',[HomeController::class,'editunitasset'])->name('editunitasset');

    Route::get('/home/assets/history/{id}',[HomeController::class,'showHistory'])->name('showHistory');

    Route::get('/home/assets/history/download/{id}',[HomeController::class,'exportAssetHistory'])->name('exportAssetHistory');

    Route::get('/home/downloadIssues',[HomeController::class,'exportIssueHistory'])->name('exportIssueHistory');

    Route::post('/home/assets/history/deleteHistory',[HomeController::class,'deleteHistory'])->name('deleteHistory');

    Route::get('/home/assets/getHistory/{id}',[HomeController::class,'getHistory'])->name('getHistory');

    Route::post('/home/insertunitasset',[HomeController::class,'insertunitasset'])->name('insertunitasset');

    Route::get('/home/users/edit/{id}',[HomeController::class,'editUsers'])->name('edit_users');

    Route::post('/home/users/editUser',[HomeController::class,'editunituser'])->name('editunituser');

    Route::post('/home/insertunituser',[HomeController::class,'insertunituser'])->name('insertunituser');

});








// Auth::routes();
