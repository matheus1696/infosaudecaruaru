<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Company\CompanyFinancialBlockController;
use App\Http\Controllers\Admin\Company\CompanyEstablishmentController;
use App\Http\Controllers\Admin\Company\CompanyEstablishmentDepartmentController;
use App\Http\Controllers\Admin\Company\CompanyOccupationController;
use App\Http\Controllers\Admin\Company\CompanyOrganizationController;
use App\Http\Controllers\Admin\Company\CompanyOrganizationLinkedUserController;
use App\Http\Controllers\Admin\Company\CompanyTypeEstablishmentController;
use App\Http\Controllers\Admin\Medication\MedicationClassificationController;
use App\Http\Controllers\Admin\Medication\MedicationController;
use App\Http\Controllers\Admin\Medication\MedicationTypeController;
use App\Http\Controllers\Admin\Medication\MedicationUnitController;
use App\Http\Controllers\Admin\Consumable\ConsumableClassificationController;
use App\Http\Controllers\Admin\Consumable\ConsumableController;
use App\Http\Controllers\Admin\Consumable\ConsumableTypeController;
use App\Http\Controllers\Admin\Consumable\ConsumableUnitController;
use App\Http\Controllers\Admin\Inventory\InventoryWarehouseStandardRequestController;
use App\Http\Controllers\Admin\Inventory\InventoryWarehouseStandardRequestListController;
use App\Http\Controllers\Admin\Region\RegionCityController;
use App\Http\Controllers\Admin\Region\RegionCountryController;
use App\Http\Controllers\Admin\Region\RegionStateController;
use App\Http\Controllers\Admin\Supply\SupplyCompanyController;
use App\Http\Controllers\Admin\User\UsersController;
use App\Http\Controllers\Inventory\Foodstuff\InventoryFoodstuffCenterController;
use App\Http\Controllers\Inventory\Foodstuff\InventoryFoodstuffStoreRoomController;
use App\Http\Controllers\Inventory\Warehouse\InventoryWarehouseStoreRoomController;
use App\Http\Controllers\Inventory\Warehouse\InventoryWarehouseCenterController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Public\ContactListsController;

//Camada de Seguraça para Usuários Logados
Route::middleware('auth')->group(function () {

    //Camada de Seguraça para Contas Verificadas
    Route::middleware(['verified'])->group(function () {        

        //Rota - Primeira Página
        Route::get('home', [HomeController::class, 'index'])->name('home');

        //Grupo de Rodas - Configurações do Sistema
        Route::prefix('admin')->group(function (){

            //Grupo de Rotas - Configuração dos Perfis dos Usuários
            Route::prefix('user')->group(function (){
                //Rota - Dados dos Usuários Cadastrados
                    Route::put('users/permission/{user}',[UsersController::class,'permission'])->name('users.permission');
                    Route::get('users/verify/{user}',[UsersController::class,'verify'])->name('users.verify');
                    Route::resource('users',UsersController::class);

            });

            //Grupo de Rotas - Configurações da Organização
            Route::prefix('company')->group(function (){

                //Rota - Dados do Organograma                
                    Route::get('organizations/organize',[CompanyOrganizationController::class,'organize'])->name('organizations.organize');
                    Route::put('organizations/status/{organization}',[CompanyOrganizationController::class,'status'])->name('organizations.status');
                    Route::resource('organizations',CompanyOrganizationController::class);
                    Route::resource('organization_linked_users',CompanyOrganizationLinkedUserController::class);                    
                //Rota - Dados Ocupação (CBO)
                    Route::resource('occupations',CompanyOccupationController::class);
                //Rota - Dados Tipo de Estabelecimento
                    Route::resource('type_establishments',CompanyTypeEstablishmentController::class);
                //Rota - Dados Estabelecimento de Saúde 
                    Route::put('establishments/status/{establishment}',[CompanyEstablishmentController::class,'status'])->name('establishments.status');
                    Route::resource('establishments',CompanyEstablishmentController::class);
                    Route::resource('establishment_departments',CompanyEstablishmentDepartmentController::class);                    
                    Route::post('establishments/{establishment}/warehouse/create',[CompanyEstablishmentController::class,'createWarehouse'])->name('establishments.createWarehouse');
                    Route::put('establishments/{establishment}/warehouse/update',[CompanyEstablishmentController::class,'updateWarehouse'])->name('establishments.updateWarehouse');
                    Route::put('establishments/{establishment}/warehouse/status',[CompanyEstablishmentController::class,'statusWarehouse'])->name('establishments.statusWarehouse');
                //Rota - Nível de Atenção
                    Route::resource('financial_blocks',CompanyFinancialBlockController::class);
                //Rota - Fornecedores
                    Route::prefix('supply')->group(function (){
                        //Rota - Fornecedores
                        Route::resource('companies',SupplyCompanyController::class);
                    });

            });

            //Grupo de Rotas - Configuração de Localização
            Route::prefix('region')->group(function (){

                //Rota - Dados Paises
                    Route::put('countries/status/{country}',[RegionCountryController::class,'status'])->name('countries.status');
                    Route::resource('countries',RegionCountryController::class);
                //Rota - Dados Estados
                    Route::put('states/status/{state}',[RegionStateController::class,'status'])->name('states.status');
                    Route::resource('states',RegionStateController::class);
                //Rota - Dados Cidades
                    Route::put('cities/status/{city}',[RegionCityController::class,'status'])->name('cities.status');
                    Route::resource('cities',RegionCityController::class);

            });

            //Grupo de Rotas - Configuração de Localização
            Route::prefix('consumable')->group(function (){

                //Rota - Apresentação de Medicamentos
                    Route::put('consumable_classifications/status/{consumable_classification}',[ConsumableClassificationController::class,'status'])->name('consumable_classifications.status');
                    Route::resource('consumable_classifications',ConsumableClassificationController::class);
                //Rota - Apresentação de Medicamentos                
                    Route::put('consumable_units/status/{consumable_unit}',[ConsumableUnitController::class,'status'])->name('consumable_units.status');
                    Route::resource('consumable_units',ConsumableUnitController::class);    
                //Rota - Tipos de Medicamentos                    
                    Route::put('consumable_types/status/{consumable_type}',[ConsumableTypeController::class,'status'])->name('consumable_types.status');
                    Route::resource('consumable_types',ConsumableTypeController::class);
                //Rota - Medicamentos
                    Route::put('consumables/status/{consumable}',[ConsumableController::class,'status'])->name('consumables.status');
                    Route::resource('consumables',ConsumableController::class);
            });
        });        

        //Grupo de Rotas - Inventários/Estoques
        Route::prefix('inventory')->group(function (){

            //Grupo de Rotas - Warehouse
            Route::prefix('warehouse')->group(function (){                
                //Grupo de Rotas - Warehouse Store Room
                Route::prefix('store_rooms')->group(function (){
                    Route::get('store_rooms',[InventoryWarehouseStoreRoomController::class,'index'])->name('warehouse.store_rooms.index');
                    Route::get('store_room/{store_room}/show',[InventoryWarehouseStoreRoomController::class,'show'])->name('warehouse.store_rooms.show');
                    Route::get('store_rooms/{store_room}/requests',[InventoryWarehouseStoreRoomController::class,'showRequest'])->name('warehouse.store_rooms.showRequest');
                    Route::get('store_rooms/{store_room}/request/create',[InventoryWarehouseStoreRoomController::class,'createRequest'])->name('warehouse.store_rooms.createRequest');
                    Route::post('store_rooms/request/create',[InventoryWarehouseStoreRoomController::class,'storeRequest'])->name('warehouse.store_rooms.storeRequest');
                    Route::get('store_rooms/{store_room}/request/{request}/edit',[InventoryWarehouseStoreRoomController::class,'editRequest'])->name('warehouse.store_rooms.editRequest');
                    Route::get('store_rooms/{store_room}/request/{request}/confirmed/request',[InventoryWarehouseStoreRoomController::class,'confirmedRequest'])->name('warehouse.store_rooms.confirmedRequest');
                    Route::get('store_rooms/{store_room}/request/{request}/canceled/request',[InventoryWarehouseStoreRoomController::class,'canceledRequest'])->name('warehouse.store_rooms.canceledRequest');
                    
                    
                    Route::put('store_room/{store_room}/request/{request}',[InventoryWarehouseStoreRoomController::class,'update'])->name('warehouse.store_rooms.update');
                    Route::post('store_rooms/{store_room}/request/{request}/create/item',[InventoryWarehouseStoreRoomController::class,'createItem'])->name('warehouse.store_rooms.createItem');
                    Route::put('store_rooms/{store_room}/request/{request}/update/item',[InventoryWarehouseStoreRoomController::class,'updateItem'])->name('warehouse.store_rooms.updateItem');
                    Route::delete('store_rooms/{store_room}/request/{request}/destroy/item',[InventoryWarehouseStoreRoomController::class,'destroyItem'])->name('warehouse.store_rooms.destroyItem');
                    Route::post('store_rooms/{store_room}/request/{request}/create/defaultlist',[InventoryWarehouseStoreRoomController::class,'createDefaultList'])->name('warehouse.store_rooms.createDefaultList');
                    Route::post('store_rooms/{store_room}/request/{request}/destroy/defaultlist',[InventoryWarehouseStoreRoomController::class,'destroyDefaultList'])->name('warehouse.store_rooms.destroyDefaultList');
                    Route::put('store_rooms/{store_room}/request/{request}/receipt/item',[InventoryWarehouseStoreRoomController::class,'receiptItem'])->name('warehouse.store_rooms.receiptItem');
                    Route::get('store_room/{store_room}/entry/show',[InventoryWarehouseStoreRoomController::class,'entryShow'])->name('warehouse.store_rooms.entryShow');
                    Route::put('store_room/{store_room}/entry/store',[InventoryWarehouseStoreRoomController::class,'entryStore'])->name('warehouse.store_rooms.entryStore');
                    Route::put('store_room/{store_room}/exit/store',[InventoryWarehouseStoreRoomController::class,'exitStore'])->name('warehouse.store_rooms.exitStore');
                });

                //Grupo de Rotas - Warehouse Center
                Route::prefix('centers')->group(function (){
                    Route::get('centers',[InventoryWarehouseCenterController::class,'index'])->name('warehouse.centers.index');
                    Route::get('center/{center}',[InventoryWarehouseCenterController::class,'show'])->name('warehouse.centers.show');
                    Route::get('center/{center}/request/{request}/edit',[InventoryWarehouseCenterController::class,'edit'])->name('warehouse.centers.edit');
                    Route::get('centers/{center}/requests',[InventoryWarehouseCenterController::class,'requestShow'])->name('warehouse.centers.requestShow');
                    Route::get('center/{center}/entry/show',[InventoryWarehouseCenterController::class,'entryShow'])->name('warehouse.centers.entryShow');
                    Route::put('center/{center}/entry/store',[InventoryWarehouseCenterController::class,'entryStore'])->name('warehouse.centers.entryStore');
                    Route::get('centers/{center}/requests/{request}/confirmed/all',[InventoryWarehouseCenterController::class,'requestConfirmedAll'])->name('warehouse.centers.requestConfirmedAll');
                });
            });
        });
    });

    //Rotas de Perfil do Usuário
    Route::put('profiles/password/{profile}',[ProfileController::class,'updatePassword'])->name('profiles.updatePassword');
    Route::resource('profiles', ProfileController::class);
});

Route::get('/',function(){return redirect()->route('login');});

//Lista Telefônica
Route::resource('contacts', ContactListsController::class);

//Rotas de Autenticação
Auth::routes(['verify' => true]);