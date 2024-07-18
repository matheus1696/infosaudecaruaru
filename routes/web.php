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
use App\Http\Controllers\Admin\Consumable\ConsumableClassificationController;
use App\Http\Controllers\Admin\Consumable\ConsumableController;
use App\Http\Controllers\Admin\Consumable\ConsumableTypeController;
use App\Http\Controllers\Admin\Consumable\ConsumableUnitController;
use App\Http\Controllers\Admin\Region\RegionCityController;
use App\Http\Controllers\Admin\Region\RegionCountryController;
use App\Http\Controllers\Admin\Region\RegionStateController;
use App\Http\Controllers\Admin\Supply\SupplyCompanyController;
use App\Http\Controllers\Admin\User\UsersController;
use App\Http\Controllers\Inventory\WarehouseStoreRoomController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Public\ContactListsController;

Route::get('/',function(){return redirect()->route('login');});

//Lista Telefônica
Route::resource('contacts', ContactListsController::class);

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
                    Route::post('establishments/warehouse/{warehouse}create',[CompanyEstablishmentController::class,'createWarehouse'])->name('establishments.createWarehouse');
                    Route::put('establishments/warehouse/{warehouse}/update',[CompanyEstablishmentController::class,'updateWarehouse'])->name('establishments.updateWarehouse');
                    Route::delete('establishments/warehouse/{warehouse}/destroy',[CompanyEstablishmentController::class,'destroyWarehouse'])->name('establishments.destroyWarehouse');
                    Route::put('establishments/warehouse/{warehouse}/status',[CompanyEstablishmentController::class,'statusWarehouse'])->name('establishments.statusWarehouse');
                    Route::resource('establishment_departments',CompanyEstablishmentDepartmentController::class);
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

        //Grupo de Rotas - Configuração de Localização
        Route::prefix('inventory')->group(function (){
            //Rota - Cadastro de Almoxarifado
            Route::post('warehouse_store_rooms/create',[WarehouseStoreRoomController::class,'store'])->name('warehouse_store_room.store');
            Route::put('warehouse_store_rooms/{warehouse_store_room}/update',[WarehouseStoreRoomController::class,'update'])->name('warehouse_store_room.update');
            Route::delete('warehouse_store_rooms/{warehouse_store_room}/destroy',[WarehouseStoreRoomController::class,'destroy'])->name('warehouse_store_room.destroy');
            Route::put('warehouse_store_rooms/{warehouse_store_room}/status',[WarehouseStoreRoomController::class,'status'])->name('warehouse_store_room.status');
        });
    });

    //Rotas de Perfil do Usuário
    Route::put('profiles/password/{profile}',[ProfileController::class,'updatePassword'])->name('profiles.updatePassword');
    Route::resource('profiles', ProfileController::class);
});

//Rotas de Autenticação
Auth::routes(['verify' => true]);