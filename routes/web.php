<?php
//middleware
use App\Http\Middleware\RoleMiddleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalesPersonController;
use App\Http\Controllers\StockPersonController;

// Login and Signup Routes
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignup']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Redirect to Role-Based Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        // Redirect based on the user's role
        switch ($user->role) {
            case 'super_admin':
                return redirect('/super-admin/home');
            case 'admin':
                return redirect('/admin/home');
            case 'sales':
                return redirect('/sales/home');
            case 'stock_person':
                return redirect('/stock/home');
            default:
                Auth::logout();
                return redirect('/login')->withErrors(['role' => 'Unauthorized role.']);
        }
    });
    
    //-----User Routes --------
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::patch('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    //-----end of user routes --------

    // Role-specific Home Routes
    //super admin routes
    Route::middleware([RoleMiddleware::class.':super_admin'])->group(function () {
        Route::get('/super-admin/home', [SuperAdminController::class, 'dashboard'])->name('super-admin-home');
        Route::get('/super-admin/settings', [SuperAdminController::class, 'settings'])->name('super-admin-settings');
    });

    // Admin Routes
    Route::middleware([RoleMiddleware::class.':admin,super_admin'])->group(function () {
        Route::get('/admin/home', [AdminController::class, 'dashboard']);
        Route::get('/admin/manage-users', [AdminController::class, 'manageUsers']);
    });

    // Sales Person Routes
    Route::middleware([RoleMiddleware::class.':sales,admin'])->group(function () {
        Route::get('/sales/home', [SalesPersonController::class, 'dashboard']);
        Route::get('/sales/orders', [SalesPersonController::class, 'viewOrders']);
    });

    // Stock Person Routes
    Route::middleware([RoleMiddleware::class.':stock_person'])->group(function () {
        Route::get('/stock/home', [StockPersonController::class, 'dashboard']);
        Route::get('/stock/inventory', [StockPersonController::class, 'viewInventory']);
    });
});
