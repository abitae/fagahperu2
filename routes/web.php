<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Config\PermissionsLive;
use App\Livewire\Convenio\DetailCmLive;
use App\Livewire\Crm\ContactLive;
use App\Livewire\Crm\CustomerLive;
use App\Livewire\Config\RolesLive;
use App\Livewire\Config\UsersLive;
use App\Livewire\Convenio\AcuerdoMarcoLive;
use App\Livewire\Convenio\ImportProductLive;
use App\Livewire\Convenio\ProductLive as ProductCmLive; //Convenio Marco
use App\Livewire\Almacen\BrandLive;
use App\Livewire\Almacen\CaracteristicaLive;
use App\Livewire\Almacen\CategoryLive;
use App\Livewire\Almacen\LineLive;
use App\Livewire\Almacen\ProductLive;
use App\Livewire\Almacen\CotizacionLive;
use App\Livewire\Crm\CustomerTypeLive;
use App\Livewire\Crm\DetailNegocioLive;
use App\Livewire\Crm\NegocioLive;
use App\Livewire\Crm\SupplierLive;
use App\Livewire\Inventario\EntryLive;
use App\Livewire\Inventario\ExitLive;
use App\Livewire\Inventario\InventoryLive;
use App\Livewire\Inventario\MovimientoLive;
use App\Livewire\Inventario\ProductoStore;
use App\Livewire\Inventario\ProductoStoreLive;
use App\Livewire\Inventario\WarehouseLive;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/users', UsersLive::class)->name('config.users');
    Route::get('/roles', RolesLive::class)->name('config.roles');
    Route::get('/permissions/{id}', PermissionsLive::class)->name('config.permissions');
});

Route::middleware('auth')->group(function () {
    Route::get('/products', ProductLive::class)->name('almacen.products');
    Route::get('/products/caracteristicas/{product}', CaracteristicaLive::class)->name('almacen.caracteristicas');
    Route::get('/cotizacion', CotizacionLive::class)->name('almacen.cotizaciones');
    Route::get('/brands', BrandLive::class)->name('almacen.brands');
    Route::get('/lines', LineLive::class)->name('almacen.lines');
    Route::get('/categories', CategoryLive::class)->name('almacen.categories');
    Route::get('/customer-types', CustomerTypeLive::class)->name('crm.customer-types');
});
//Acuerdo Marco
Route::middleware('auth')->group(function () {
    Route::get('/acuerdos', AcuerdoMarcoLive::class)->name('convenio.acuerdos');
    Route::get('/products-data', ProductCmLive::class)->name('convenio.data');
    Route::get('/products-import', ImportProductLive::class)->name('convenio.import');
    Route::get('/detail/{id}', DetailCmLive::class)->name('convenio.detail');
});
Route::middleware('auth')->group(function () {
    Route::get('/customers', CustomerLive::class)->name('crm.customers');
    Route::get('/suppliers', SupplierLive::class)->name('crm.suppliers');
    Route::get('/contacts', ContactLive::class)->name('crm.contacts');
    Route::get('/negocios', NegocioLive::class)->name('crm.negocios');
    Route::get('/detailcrm/{id}', DetailNegocioLive::class)->name('crm.detail');
    //Route::get('/detailcrm', DetailNegocioLive::class)->name('crm.detailnew');
});

Route::middleware('auth')->group(function () {
    Route::get('/warehouses', WarehouseLive::class)->name('inventario.warehouses');
    Route::get('/inventory', InventoryLive::class)->name('inventario.inventory');
    Route::get('/movimientos', MovimientoLive::class)->name('inventario.movimientos');
    Route::get('/inventory/entry/{id}', EntryLive::class)->name('inventario.entry');
    Route::get('/inventory/exit/{id}', ExitLive::class)->name('inventario.exit');
    Route::get('/inventory/product', ProductoStoreLive::class)->name('inventario.product');
});
require __DIR__ . '/auth.php';
