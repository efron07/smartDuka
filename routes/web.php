<?php
//middleware
use App\Http\Middleware\RoleMiddleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalesPersonController;
use App\Http\Controllers\StockPersonController;

// Items and inventory controllers
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MeasureController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\WriteOffController;
use App\Http\Controllers\ReportController;


Route::get('/unauthorized', function () {
    abort(403);
})->name('unauthorized');

// Login and Signup Routes
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignup']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

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

    //-----Business routes-----
    Route::middleware([RoleMiddleware::class . ':super_admin'])->group(function () {
        Route::get('businesses', [BusinessController::class, 'index'])->name('businesses.index'); // View all businesses
        Route::get('businesses/create', [BusinessController::class, 'create'])->name('businesses.create'); // Show create form
        Route::post('businesses', [BusinessController::class, 'store'])->name('businesses.store'); // Store new business
        Route::get('businesses/{business}/edit', [BusinessController::class, 'edit'])->name('businesses.edit'); // Show edit form
        Route::put('businesses/{business}', [BusinessController::class, 'update'])->name('businesses.update'); // Update business
        Route::delete('businesses/{business}', [BusinessController::class, 'destroy'])->name('businesses.destroy'); // Delete business
    });
    //------end of business route ------

   
    // Items & Inventory Routes
    Route::middleware([RoleMiddleware::class . ':super_admin,admin,stock_person'])->group(function () {

        // Item Routes
        Route::get('items/home', [ItemController::class, 'home'])->name('items.index'); // View home

        Route::get('items', [ItemController::class, 'index'])->name('items.index'); // View all items
        Route::get('items/create', [ItemController::class, 'create'])->name('items.create'); // Show create form
        Route::post('items', [ItemController::class, 'store'])->name('items.store'); // Store new item
        Route::get('items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit'); // Show edit form
        Route::put('items/{item}', [ItemController::class, 'update'])->name('items.update'); // Update item
        Route::delete('items/{item}', [ItemController::class, 'destroy'])->name('items.destroy'); // Delete item
    
        // Service Routes
        Route::get('services', [ServiceController::class, 'index'])->name('services.index'); // View all services
        Route::get('services/create', [ServiceController::class, 'create'])->name('services.create'); // Show create form
        Route::post('services', [ServiceController::class, 'store'])->name('services.store'); // Store new service
        Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit'); // Show edit form
        Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update'); // Update service
        Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy'); // Delete service
    
        // Unit of Measure Routes
        Route::get('measures', [MeasureController::class, 'index'])->name('measures.index'); // View all units
        Route::get('measures/create', [MeasureController::class, 'create'])->name('measures.create'); // Show create form
        Route::post('measures', [MeasureController::class, 'store'])->name('measures.store'); // Store new unit
        Route::get('measures/{measure}/edit', [MeasureController::class, 'edit'])->name('measures.edit'); // Show edit form
        Route::put('measures/{measure}', [MeasureController::class, 'update'])->name('measures.update'); // Update unit
        Route::delete('measures/{measure}', [MeasureController::class, 'destroy'])->name('measures.destroy'); // Delete unit
    
        // Stock Routes
        Route::get('stocks/opening', [StockController::class, 'opening'])->name('stocks.opening'); // View opening stock
        Route::post('stocks/opening', [StockController::class, 'storeOpening'])->name('stocks.store_opening'); // Store opening stock
    
        // Write-Off Routes
        Route::get('writeoffs', [WriteOffController::class, 'index'])->name('writeoffs.index'); // View write-offs
        Route::get('writeoffs/create', [WriteOffController::class, 'create'])->name('writeoffs.create'); // Show create form
        Route::post('writeoffs', [WriteOffController::class, 'store'])->name('writeoffs.store'); // Store write-off
        Route::get('writeoffs/{writeoff}/edit', [WriteOffController::class, 'edit'])->name('writeoffs.edit'); // Show edit form
        Route::put('writeoffs/{writeoff}', [WriteOffController::class, 'update'])->name('writeoffs.update'); // Update write-off
        Route::delete('writeoffs/{writeoff}', [WriteOffController::class, 'destroy'])->name('writeoffs.destroy'); // Delete write-off
    
        // Report Routes
        Route::get('reports/value-summary', [ReportController::class, 'valueSummary'])->name('reports.value_summary'); // Inventory Value Summary Report
        Route::get('reports/quantity-summary', [ReportController::class, 'quantitySummary'])->name('reports.quantity_summary'); // Inventory Quantity Summary Report
        Route::get('reports/quantity-by-location', [ReportController::class, 'quantityByLocation'])->name('reports.quantity_by_location'); // Quantity by Location Report
        Route::get('reports/profit-margin', [ReportController::class, 'profitMargin'])->name('reports.profit_margin'); // Profit Margin Report
    });
    

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
