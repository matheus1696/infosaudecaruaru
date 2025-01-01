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
use App\Http\Controllers\Admin\Hospital\Bed\HospitalBedController;
use App\Http\Controllers\Admin\Hospital\Bed\HospitalBedStatusController;
use App\Http\Controllers\Admin\Hospital\Bed\HospitalBedClassificationController;
use App\Http\Controllers\Admin\Professional\ProfessionalDoctorController;
use App\Http\Controllers\Admin\Region\RegionCityController;
use App\Http\Controllers\Admin\Region\RegionCountryController;
use App\Http\Controllers\Admin\Region\RegionStateController;
use App\Http\Controllers\Admin\Supply\SupplyCompanyController;
use App\Http\Controllers\Admin\User\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Fleet\FleetModelsController;
use App\Http\Controllers\Fleet\FleetVehiclesController;
use App\Http\Controllers\Inventory\InventoryStoreRoomController;
use App\Http\Controllers\Inventory\InventoryStoreRoomItemController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Public\ContactListsController;
use App\Http\Controllers\Shift\ShiftMedicalController;

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

            //Grupo de Rotas - Configuração de Frotas
            Route::prefix('fleet')->group(function (){
                //Rota - Dados dos Modelos das Frotas
                    Route::resource('fleet_models',FleetModelsController::class);
                    Route::resource('fleet_vehicles',FleetVehiclesController::class);
            });

            //Grupo de Rotas - Configuração de Frotas
            Route::prefix('professional')->group(function (){
                //Rota - Dados dos Modelos das Frotas
                    Route::put('professional_doctors/status/{professional_doctor}',[ProfessionalDoctorController::class,'status'])->name('professional_doctors.status');
                    Route::resource('professional_doctors',ProfessionalDoctorController::class);
            });

            //Grupo de Rotas - Configuração Hospitalares
            Route::prefix('hospital')->group(function (){
                //Rota - Leitos

                Route::put('hospital_bed_classifications/status/{hospital_bed_classification}',[HospitalBedClassificationController::class,'status'])->name('hospital_bed_classifications.status');
                Route::resource('hospital_bed_classifications',HospitalBedClassificationController::class);

                Route::put('hospital_bed_statuses/status/{hospital_bed_status}',[HospitalBedStatusController::class,'status'])->name('hospital_bed_statuses.status');
                Route::resource('hospital_bed_statuses',HospitalBedStatusController::class);

                Route::resource('hospital_beds',HospitalBedController::class);
            });
        });

        //Grupo de Rotas - Configuração de Localização
        Route::prefix('inventory')->group(function (){
            //Rota - Cadastro de Almoxarifado
            Route::post('store/rooms/store',[InventoryStoreRoomController::class,'store'])->name('inventory_store_rooms.store');
            Route::put('store/rooms/{inventory_store_room}/update',[InventoryStoreRoomController::class,'update'])->name('inventory_store_rooms.update');
            Route::delete('store/rooms/{inventory_store_room}/destroy',[InventoryStoreRoomController::class,'destroy'])->name('inventory_store_rooms.destroy');
            Route::put('store/rooms/{inventory_store_room}/status',[InventoryStoreRoomController::class,'status'])->name('inventory_store_rooms.status');
            Route::post('store/rooms/{inventory_store_room}/permission',[InventoryStoreRoomController::class,'permission'])->name('inventory_store_rooms.permission');
            Route::delete('store/rooms/{inventory_store_room}/revoke',[InventoryStoreRoomController::class,'revoke'])->name('inventory_store_rooms.revoke');

            //Rota - Almoxarifado
            Route::get('store/rooms/items/index',[InventoryStoreRoomItemController::class,'index'])->name('inventory_store_room_items.index');
            Route::get('store/rooms/{inventory_store_room_item}/items/show',[InventoryStoreRoomItemController::class,'show'])->name('inventory_store_room_items.show');
            Route::get('store/rooms/{inventory_store_room_item}/items/entry/show',[InventoryStoreRoomItemController::class,'entryShow'])->name('inventory_store_room_items.entryShow');
            Route::post('store/rooms/items/entry',[InventoryStoreRoomItemController::class,'entryStore'])->name('inventory_store_room_items.entryStore');
            Route::post('store/rooms/items/exit',[InventoryStoreRoomItemController::class,'exitStore'])->name('inventory_store_room_items.exitStore');
        });

        //Grupo de Rotas - Configuração de Frotas
        Route::prefix('fleet')->group(function (){
            //Rota - Controle das Frotas
                Route::resource('fleet_vehicles',FleetVehiclesController::class);                
                Route::get('fleet_vehicles/{fleet_vehicle}/{create_category}',[FleetVehiclesController::class,'create_category'])->name('fleet_vehicles.create_category');
                Route::post('fleet_vehicles/{fleet_vehicle}/{store_category}',[FleetVehiclesController::class,'store_category'])->name('fleet_vehicles.store_category');
        });

        //Grupo de Rotas - Configuração de Frotas
        Route::prefix('shift')->group(function (){
            //Rota - Plantões Médicos
                Route::resource('shift_medicals',ShiftMedicalController::class);
        });

        //Grupo de Rotas - Configuração de Frotas
        Route::prefix('dashbords')->group(function (){
            //Rota - Plantões Médicos
                Route::get('shift_medical',[DashboardController::class,'dashboard_shift_medical'])->name('dashboards.shift_medical');
        });
    });

    //Rotas de Perfil do Usuário
    Route::get('profiles/profile',[ProfileController::class,'editProfile'])->name('profiles.editProfile');
    Route::put('profiles/profile',[ProfileController::class,'updateProfile'])->name('profiles.updateProfile');
    Route::get('profiles/professional',[ProfileController::class,'editProfessional'])->name('profiles.editProfessional');
    Route::put('profiles/professional',[ProfileController::class,'updateProfessional'])->name('profiles.updateProfessional');
    Route::get('profiles/password',[ProfileController::class,'editPassword'])->name('profiles.editPassword');
    Route::put('profiles/password',[ProfileController::class,'updatePassword'])->name('profiles.updatePassword');
});

//Rotas de Autenticação
Auth::routes(['verify' => true]);