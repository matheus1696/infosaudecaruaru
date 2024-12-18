<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Factory
        if (env('DEBUG') != TRUE) {

            // Cria 50 médicos fictícios
            \App\Models\User::factory(1000)->create();

            // Cria 100 usuários
            \App\Models\Professional\ProfessionalDoctor::factory()->count(100)->create();
        }

        $this->call([
            UserPermissionsSeeder::class,
            UserSexSeeder::class,
            UserSeeder::class,
            RegionCountrySeeder::class,
            RegionStateSeeder::class,
            RegionCitySeeder::class,
            CompanyOrganizationSeeder::class,
            CompanyOccupationSeeder::class,
            CompanyTypeEstablishmentsSeeder::class,
            CompanyFinancialBlockSeeder::class,
            CompanyEstablishmentSeeder::class,
            CompanyEstablishmentDepartmentSeeder::class,
            ConsumableClassificationSeeder::class,
            ConsumableTypeSeeder::class,
            ConsumableUnitSeeder::class,
            ConsumableSeeder::class,
            SupplyCompanySeeder::class,
            FleetManufacturerSeeder::class,
            FleetModelsSeeder::class,
        ]);
    }
}
