<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TestController;
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
    return redirect('/login');
});

Route::get('/load_product', [TestController::class, 'loadProduct']);



Route::get('/login', function () {
    if (auth()->user()) {
        return redirect('/invoice-overview')->with('success', 'You are already logged in');
    }
    return view('login');
})->name('login');


Route::get('/items', [ItemController::class, 'getItems']);
Route::get('/search', [ItemController::class, 'searchItem']);
Route::get('/search_client', [ClientController::class, 'searchClient']);
Route::get('/get_hours', [StaffController::class, 'modifyHours']);
Route::post('/search_product', [ItemController::class, 'productSearch']);

Route::get('/invoice/print/{invoice?}', [InvoiceController::class, 'printIndex']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/receipt/{trno}', [PosController::class, 'printReceipt']);



Route::group(['middleware' => ['auth']], function () {

    Route::get('/invoice/{invoice}', [InvoiceController::class, 'viewInvocieIndex']);
    Route::get('/client/{id}', [ClientController::class, 'clientProfileIndex']);



    Route::post('/upload-excel', [ExcelImportController::class, 'importItems']);
    Route::get('/invoice-overview', [PosController::class, 'invoiceIndex']);
    Route::get('/invoices', [PosController::class, 'invoicesIndex']);
    Route::get('/make_restock', [PosController::class, 'make_restockIndex']);
    Route::get('/invoice/new/{id?}', [InvoiceController::class, 'newInvocieIndex']);
    Route::get('/payments', [InvoiceController::class, 'paymentIndex']);
    Route::get('/delete_payment/{pay_id}', [InvoiceController::class, 'deletePayment']);
    Route::post('/register_payment', [InvoiceController::class, 'registerPayment']);
    Route::post('/create_invoice', [InvoiceController::class, 'createNewInvoice']);
    Route::post('/edit_invoice', [InvoiceController::class, 'editInvoice']);
    Route::get('/delete_invoice/{invoice_id}', [InvoiceController::class, 'deleteInvoice']);
    Route::get('/get_sales/{sales_id}', [PosController::class, 'getSales']);
    Route::get('/search_invoice/{invoice}', [InvoiceController::class, 'searchInvoice']);


    Route::post('/add_vitals', [AdmissionController::class, 'addVitals']);
    Route::get('/delete_vital/{id}', [AdmissionController::class, 'deleteVital']);
    Route::post('/update_concern', [AdmissionController::class, 'updateClincalRecords']);
    Route::get('/new-admission', [AdmissionController::class, 'admissionIndex']);
    Route::post('/new-admission', [AdmissionController::class, 'newAdmisison']);
    Route::get('/manage-admission', [AdmissionController::class, 'manageIndex']);
    Route::get('/admission/{id}', [AdmissionController::class, 'admissionSigleIndex']);


    Route::post('/make_sales', [SalesController::class, 'makeSales']);
    Route::post('/return_items', [SalesController::class, 'returnItem']);
    Route::get('/purchasing', [SalesController::class, 'purchasingIndex']);
    Route::get('/today_sales/{id?}/{date?}', [SalesController::class, 'todaySales']);

    Route::group(['prefix' => 'item'], function () {
        Route::get('/add', [ItemController::class, 'addItemIndex']);
        Route::post('/add', [ItemController::class, 'addItem']);
        Route::post('/update', [ItemController::class, 'updateItem']);
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/add', [CategoryController::class, 'index']);
        Route::post('/add', [CategoryController::class, 'addCategory']);
    });





    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
        Route::get('/dashboard', [AdminController::class, 'renderIndex']);
        Route::get('/get_expense_graph_info', [AdminController::class, 'getExpenseGraphInfo']);


        Route::get('/manage-staffs', [StaffController::class, 'createStaffIndex']);
        Route::post('/add_staff', [StaffController::class, 'createStaff']);


        Route::get('/department', [CategoryController::class, 'deptIndex']);
        Route::post('/create_department', [CategoryController::class, 'createDept']);
        Route::get('/delete_department/{id}', [CategoryController::class, 'deleteDept']);



        Route::get('/expenses-overview', [ExpensesController::class, 'expensesIndex']);
        Route::get('/expenses-add', [ExpensesController::class, 'addIndex']);
        Route::post('/create-expenses-category', [ExpensesController::class, 'addExpensesCategory']);
        Route::post('/create-expenses', [ExpensesController::class, 'createExpense']);
        Route::get('/delete_expenses_category/{id}', [ExpensesController::class, 'deleExpenseCategory']);

        Route::get('/stock-profile/{item}', [ItemController::class, 'adminStockProfile']);
        Route::get('/stock/{item}', [ItemController::class, 'adminStockProfile']);


        Route::get('/staff/{id}', [StaffController::class, 'staffProfileIndex']);
        Route::get('/today-sales', [AdminController::class, 'todaySalesIndex']);




        Route::group(['prefix' => 'stock'], function () {
            Route::get('/restock', [StockController::class, 'restockIndex']);
            Route::get('/delete/{restock_summary}', [StockController::class, 'deleteRestock']);
            Route::post('/restock', [StockController::class, 'restockItem']);
        });

        Route::group(['prefix' => 'client'], function () {
            Route::get('/new-client', [ClientController::class, 'clientIndex']);
            Route::post('/new-client', [ClientController::class, 'createClientProfile']);
            Route::get('/all', [ClientController::class, 'allClient']);
        });



        Route::get('/restock-history/{date?}', [StockController::class, 'restockHistoryIndex']);
    });
});
