<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    //logout rotue
    Route::get('/logout', [ProfileController::class, 'Logout'])->name('user.logout');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth'], function () {

    //employe
    Route::group(['prefix' => 'employe'], function () {
        Route::get('/list', 'EmployeController@Index')->name('employe.list');
        Route::get('/add', 'EmployeController@CreteEmploye')->name('add.employe');
        Route::post('/store', 'EmployeController@StoreEmploye')->name('employe.store');

        Route::get('/details/{id}', 'EmployeController@EmployeDetails')->name('employe.details');

        Route::get('/edit/{id}', 'EmployeController@EmployeEdit')->name('employe.edit');

        Route::post('/update', 'EmployeController@EmployeUpdate')->name('employe.update');

        Route::get('/delete/{id}', 'EmployeController@EmployeDelete')->name('employe.delete');
    });


    //customer route
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/create', 'CustomerController@Create')->name('create.customer');
        Route::post('/add', 'CustomerController@AddCustomer')->name('add.customer');
        Route::post('/add', 'CustomerController@AddCustomerFromPos')->name('add.customerfrompos');
        Route::get('/list', 'CustomerController@CustomerList')->name('customer.list');

        Route::get('/details/{id}', 'CustomerController@CustomerDetails')->name('customer.details');

        Route::get('/edit/{id}', 'CustomerController@CustomerEdit')->name('customer.edit');

        Route::post('/update', 'CustomerController@CustomerUpdate')->name('update.customer');

        Route::get('/delete/{id}', 'CustomerController@CustomerDelete')->name('customer.delete');
    });

    //supplier route
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/create', 'SupplierController@CreateSupplier')->name('create.supplier');
        Route::post('/add', 'SupplierController@AddSupplier')->name('add.supplier');
        Route::get('/list', 'SupplierController@SupplierList')->name('supplier.list');

        Route::get('/details/{id}', 'SupplierController@SupplierDetails')->name('supplier.details');

        Route::get('/edit/{id}', 'SupplierController@SupplierEdit')->name('supplier.edit');

        Route::post('/update', 'SupplierController@SupplierUpdate')->name('update.supplier');

        Route::get('/delete/{id}', 'SupplierController@SupplierDelete')->name('supplier.delete');
    });


    //advanced salary route
    Route::group(['prefix' => 'employe-advanced-salary'], function () {
        Route::get('/create', 'SalaryController@CreateAdvancedSalary')->name('create.advanced-salary');
        Route::post('/add', 'SalaryController@AddSAdvancedSalary')->name('add.advanced-salary');
        Route::get('/list', 'SalaryController@AllAdvancedSalary')->name('all-advanced.salary');

        Route::get('/details/{id}', 'SalaryController@DetailsAdvancedSalary')->name('details-advanced.salary');

        Route::get('/edit/{id}', 'SalaryController@AdvancedSalaryEdit')->name('edit-advanced.salary');

        Route::post('/update', 'SalaryController@AdvancedSalaryUpdate')->name('update-advanced.salary');

        Route::get('/delete/{id}', 'SalaryController@AdvancedSalaryDelete')->name('advanced_salary.delete');
    });


    //salary route
    Route::group(['prefix' => 'salary'], function () {
        Route::get('/create', 'SalaryController@PaySalary')->name('pay.salary');
        Route::post('/add', 'SalaryController@AddSAdvancedSalary')->name('add.advanced-salary');
        Route::get('/list', 'SalaryController@AllAdvancedSalary')->name('all-advanced.salary');

        Route::get('/details/{id}', 'SalaryController@DetailsAdvancedSalary')->name('details-advanced.salary');

        Route::get('/edit/{id}', 'SalaryController@AdvancedSalaryEdit')->name('edit-advanced.salary');

        Route::post('/update', 'SalaryController@AdvancedSalaryUpdate')->name('update-advanced.salary');

        Route::get('/delete/{id}', 'SupplierController@SupplierDelete')->name('supplier.delete');
    });


    //category route
    Route::group(['prefix' => 'category'], function () {
        Route::get('/create', 'CategoryController@CategoryCreate')->name('add.category');
        Route::post('/add', 'CategoryController@StoreCategory')->name('store.category');
        Route::get('/list', 'CategoryController@CategoryList')->name('category.list');

        Route::get('/edit/{id}', 'CategoryController@CategoryEdit')->name('category.edit');

        Route::post('/update', 'CategoryController@UpdateCategory')->name('update.category');

        Route::get('/delete/{id}', 'CategoryController@CategoryDelete')->name('category.delete');
    });

    //brand route
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/create', 'BrandController@BrandCreate')->name('add.brand');
        Route::post('/add', 'BrandController@StoreBrand')->name('store.brand');
        Route::get('/list', 'BrandController@BrandList')->name('brand.list');

        Route::get('/edit/{id}', 'BrandController@BrandEdit')->name('brand.edit');

        Route::post('/update', 'BrandController@UpdateBrand')->name('update.brand');

        Route::get('/delete/{id}', 'BrandController@BrandDelete')->name('brand.delete');
    });


    //product route
    Route::group(['prefix' => 'product'], function () {
        Route::get('/create', 'ProductController@ProductCreate')->name('add.product');
        Route::post('/add', 'ProductController@StoreProduct')->name('store.product');
        Route::get('/list', 'ProductController@ProductList')->name('product.list');

        Route::get('/details/{id}', 'ProductController@ProductDetails')->name('product.details');

        Route::get('/edit/{id}', 'ProductController@EditProduct')->name('edit.product');

        Route::post('/update', 'ProductController@UpdateProduct')->name('update.product');

        Route::get('/delete/{id}', 'ProductController@DeleteProduct')->name('delete.product');
    });

    //pos route
    Route::group(['prefix' => 'pos'], function () {
        Route::get('/index', 'PosController@PosIndex')->name('pos');
        Route::get('/cart-add/{id}', 'PosController@AddtoCart')->name('add.cart');
        Route::get('/cart-delete/{id}', 'PosController@CartDelete')->name('delete.cart');

        Route::post('/aty-update', 'PosController@QtyUpdate')->name('qty.update');

        Route::get('/cart-clear', 'PosController@CartClear')->name('cart.clear');

        Route::post('/checkout', 'PosController@Checkout')->name('checkout');

        Route::post('/tax-add', 'PosController@TaxAdd')->name('tax.add');

        Route::post('/discount-add', 'PosController@DiscountAdd')->name('discount.add');
        Route::post('/create-invoice', 'PosController@CreateInvone')->name('create.invoice');
    });

    //excel import and excel product route
    Route::group(['prefix' => 'product'], function () {
        Route::get('/import-from-excel', 'ProductController@ImportProduct')->name('import.product');

        Route::get('/export', 'ProductController@export')->name('export');

        Route::post('/import', 'ProductController@import')->name('import');

        Route::get('/details/{id}', 'ProductController@ProductDetails')->name('product.details');

        Route::get('/edit/{id}', 'ProductController@EditProduct')->name('edit.product');

        Route::post('/update', 'ProductController@UpdateProduct')->name('update.product');

        Route::get('/delete/{id}', 'ProductController@DeleteProduct')->name('delete.product');
    });

    //expense route
    Route::group(['prefix' => 'expense'], function () {
        Route::get('/create', 'ExpenseController@CreateExpense')->name('add.expense');
        Route::post('/add', 'ExpenseController@StoreExpense')->name('store.expense');
        Route::get('/list', 'ExpenseController@ExpenseList')->name('expense.list');

        Route::get('/edit/{id}', 'ExpenseController@EditExpense')->name('expense.edit');

        Route::post('/update', 'ExpenseController@UpdateExpense')->name('update.expense');

        Route::get('/delete/{id}', 'ExpenseController@DeleteExpense')->name('expense.delete');
    });


    //product specifiacation route
    Route::group(['prefix' => 'product-specification'], function () {
        Route::get('/create', 'ProductSpecificationController@ProductSpecificationCreate')->name('add.product-specification');

        Route::post('/add-warehouse', 'ProductSpecificationController@WarehouseAdd')->name('add.warehouse');

        Route::get('/edit-warehouse/{id}', 'ProductSpecificationController@EditWarehouse')->name('edit.warehouse');

        Route::post('/warehouse-update', 'ProductSpecificationController@UpdateWarehouse')->name('warehouse.update');

        Route::get('/delete/{id}', 'ProductSpecificationController@WarehouseDelete')->name('warehouse.delete');

        Route::post('/add-unit', 'ProductSpecificationController@AddUnit')->name('add.unit');

        Route::get('/edit-unit/{id}', 'ProductSpecificationController@EditUnit')->name('edit.unit');

        Route::post('/update-unit', 'ProductSpecificationController@UnitUpdate')->name('unit.update');

        Route::get('/delete-unit/{id}', 'ProductSpecificationController@DeleteUnit')->name('delete.unit');

        Route::post('/add-storage-spot', 'ProductSpecificationController@AddStorageSpot')->name('add.storage_spot');

        Route::get('/edit-storage-spot/{id}', 'ProductSpecificationController@EditStorageSpot')->name('edit.spot');

        Route::post('/update-storage-spot', 'ProductSpecificationController@UpdateStorageSpot')->name('spot.update');

        Route::get('/delete-storage-spot/{id}', 'ProductSpecificationController@DeleteStorageSpot')->name('spot.delete');
    });


    //product purchase route
    Route::group(['prefix' => 'purchasse'], function () {
        Route::get('/create', 'PurchaseController@CreatePurchase')->name('add.purchase');
        Route::post('/store', 'PurchaseController@PurchaseStore')->name('purchase.store');
        Route::get('/list', 'PurchaseController@PurchaseList')->name('purchase.list');

        Route::get('/edit/{id}', 'PurchaseController@PurchaseEdit')->name('purchase.edit');

        Route::post('/update', 'PurchaseController@PurchaseUpdate')->name('purchase.update');

        Route::get('/delete/{id}', 'PurchaseController@PurchaseDelete')->name('purchase.delete');

        Route::get('/view-details/{id}', 'PurchaseController@PurchaseView')->name('purchase.view');
    });


     //product purchase route
     Route::group(['prefix' => 'pay'], function () {
        Route::get('/create/{id}', 'PayController@CreatePay')->name('create.pay');
        Route::post('/pay-supplier', 'PayController@PayStore')->name('pay.supplier');
        Route::get('/list', 'PurchaseController@PurchaseList')->name('purchase.list');

        Route::get('/edit/{id}', 'PurchaseController@PurchaseEdit')->name('purchase.edit');

        Route::post('/update', 'PurchaseController@PurchaseUpdate')->name('purchase.update');

        Route::get('/delete/{id}', 'PurchaseController@PurchaseDelete')->name('purchase.delete');

        Route::get('/view-details/{id}', 'PurchaseController@PurchaseView')->name('purchase.view');
    });


    //company settings route
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/company-info', 'SettingsController@CompanyInfo')->name('company.info');
        Route::post('/add', 'SettingsController@CompanyInfoUpdate')->name('company-info.updae');
    });
});

require __DIR__ . '/auth.php';
