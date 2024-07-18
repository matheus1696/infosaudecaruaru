<?php

namespace Database\Seeders;

use App\Models\Supply\SupplyCompany;
use Illuminate\Database\Seeder;

class SupplyCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SupplyCompany::create([
            'cnpj'=>'123.654.987/0001-25',
            'title'=>'Teste',
            'filter'=>'teste',
            'address'=>'Rua',
            'number'=>'123',
            'district'=>'Bairro',
            'city_id'=>2604106,
            'contact_1'=>'(81)9-9363-2860',
            'email_1'=>'teste@gmail.com'
        ]);
    }
}