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
use App\Http\Controllers\Admin\User\UsersController;
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
                    
                    //Rota de Vinculação de Usuário com Organização
                    Route::resource('organization_linked_users',CompanyOrganizationLinkedUserController::class);
                    
                //Rota - Dados Ocupação (CBO)
                    Route::resource('occupations',CompanyOccupationController::class);
                //Rota - Dados Tipo de Estabelecimento
                    Route::resource('type_establishments',CompanyTypeEstablishmentController::class);
                //Rota - Dados Estabelecimento de Saúde 
                    Route::put('establishments/status/{establishment}',[CompanyEstablishmentController::class,'status'])->name('establishments.status');
                    Route::resource('establishments',CompanyEstablishmentController::class);
                //Rota - Dados dos Departamentos do Estabelecimento de Saúde
                    Route::put('establishment_departments/inventory/{establishment_department}',[CompanyEstablishmentDepartmentController::class,'hasInventory'])->name('establishment_departments.hasInventory');
                    Route::resource('establishment_departments',CompanyEstablishmentDepartmentController::class);
                //Rota - Nível de Atenção
                    Route::resource('financial_blocks',CompanyFinancialBlockController::class);

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

            //Grupo de Rotas - Configuração de Localização
            Route::prefix('medication')->group(function (){

                //Rota - Apresentação de Produtos
                    Route::put('medication_classifications/status/{medication_classification}',[MedicationClassificationController::class,'status'])->name('medication_classifications.status');
                    Route::resource('medication_classifications',MedicationClassificationController::class);                    
                //Rota - Apresentação de Produtos
                    Route::put('medication_units/status/{medication_unit}',[MedicationUnitController::class,'status'])->name('medication_units.status');
                    Route::resource('medication_units',MedicationUnitController::class);
                //Rota - Tipos de Produtos
                    Route::put('medication_types/status/{medication_type}',[MedicationTypeController::class,'status'])->name('medication_types.status');
                    Route::resource('medication_types',MedicationTypeController::class);
                //Rota - Produtos
                    Route::put('medications/status/{medication}',[MedicationController::class,'status'])->name('medications.status');
                    Route::resource('medications',MedicationController::class);
            });

            //Grupo de Rotas - Configuração de Inventários
            Route::prefix('inventory')->group(function (){

                //Grupo de Rotas - Configuração de Almoxarifados e Depósitos
                Route::prefix('warehouse')->group(function (){

                    //Grupo de Rotas - Configuração de Almoxarifados e Depósitos
                    Route::prefix('standard')->group(function (){

                        //Rota - Lista de Materiais Padrões
                        Route::put('standard_requests/status/{standard_request}',[InventoryWarehouseStandardRequestController::class,'status'])->name('standard_requests.status');
                        Route::resource('standard_requests',InventoryWarehouseStandardRequestController::class);
                        Route::resource('standard_request_lists',InventoryWarehouseStandardRequestListController::class);
                    });
                });
            });
        });        

        //Grupo de Rotas - Inventários/Estoques
        Route::prefix('inventory')->group(function (){
            //Grupo de Rotas - 
            Route::prefix('warehouse')->group(function (){
                //Rota - 
                Route::get('store_rooms',[InventoryWarehouseStoreRoomController::class,'index'])->name('store_rooms.index');
                Route::get('store_rooms/{store_room}',[InventoryWarehouseStoreRoomController::class,'show'])->name('store_rooms.show');
                Route::get('store_rooms/{store_room}/requests',[InventoryWarehouseStoreRoomController::class,'requestShow'])->name('store_rooms.requestShow');
                Route::get('store_rooms/{store_room}/requests/create',[InventoryWarehouseStoreRoomController::class,'requestCreate'])->name('store_rooms.requestCreate');
                Route::put('store_rooms/{store_room}/requests/status',[InventoryWarehouseStoreRoomController::class,'requestStatus'])->name('store_rooms.requestStatus');
                Route::get('store_rooms/requests/{request}/edit',[InventoryWarehouseStoreRoomController::class,'requestEdit'])->name('store_rooms.requestEdit');
                Route::put('store_rooms/requests/{request}',[InventoryWarehouseStoreRoomController::class,'requestUpdate'])->name('store_rooms.requestUpdate');
                Route::delete('store_rooms/requests/{request}',[InventoryWarehouseStoreRoomController::class,'requestDelete'])->name('store_rooms.requestDelete');
                Route::post('store_rooms/requests/{request}/standard_requests',[InventoryWarehouseStoreRoomController::class,'requestStandardRequest'])->name('store_rooms.requestStandardRequest');
                Route::get('store_rooms/{store_room}/entryShow',[InventoryWarehouseStoreRoomController::class,'entryShow'])->name('store_rooms.entryShow');
                Route::put('store_rooms/{store_room}/entryStore',[InventoryWarehouseStoreRoomController::class,'entryStore'])->name('store_rooms.entryStore');
                Route::put('store_rooms/{store_room}/exitStore',[InventoryWarehouseStoreRoomController::class,'exitStore'])->name('store_rooms.exitStore');

                //Rota - 
                Route::get('warehouse_centers',[InventoryWarehouseCenterController::class,'index'])->name('warehouse_centers.index');
                Route::get('warehouse_centers/{warehouse_center}',[InventoryWarehouseCenterController::class,'show'])->name('warehouse_centers.show');
                Route::get('warehouse_centers/{warehouse_center}/entryShow',[InventoryWarehouseCenterController::class,'entryShow'])->name('warehouse_centers.entryShow');
                Route::put('warehouse_centers/{warehouse_center}/entryStore',[InventoryWarehouseCenterController::class,'entryStore'])->name('warehouse_centers.entryStore');
                Route::put('warehouse_centers/{warehouse_center}/exitStore',[InventoryWarehouseCenterController::class,'exitStore'])->name('warehouse_centers.exitStore');
            });
        });
    });

    //Rotas de Perfil do Usuário
    Route::put('profiles/password/{profile}',[ProfileController::class,'updatePassword'])->name('profiles.updatePassword');
    Route::resource('profiles', ProfileController::class);
});

Route::get('/',function(){return view('index');});

//Lista Telefônica
Route::resource('contacts', ContactListsController::class);

//Rotas de Autenticação
Auth::routes(['verify' => true]);


