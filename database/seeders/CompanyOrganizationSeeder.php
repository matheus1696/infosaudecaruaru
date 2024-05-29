<?php

namespace Database\Seeders;

use App\Models\Company\CompanyOrganization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CompanyOrganization::create([
            'title'=>'Prefeitura Municipal de Caruaru',
            'acronym'=>'PMC',
            'filter'=>'prefeitura municipal de caruaru',
            'hierarchy'=>'0'
        ]);

        CompanyOrganization::create([
            'title'=>'Secretaria de Saúde de Caruaru',
            'acronym'=>'SMS',
            'filter'=>'secretaria de saude de caruaru',
            'hierarchy'=>'1'
        ]);

        CompanyOrganization::create([
            'title'=>'Secretaria de Educação de Caruaru',
            'acronym'=>'SEDUC',
            'filter'=>'secretaria de educação de caruaru',
            'hierarchy'=>'1'
        ]);

        CompanyOrganization::create([
            'title'=>'Secretaria de Fundação e Cultura de Caruaru',
            'acronym'=>'SFCC',
            'filter'=>'secretaria de fundacao e cultura de caruaru',
            'hierarchy'=>'1'
        ]);

        CompanyOrganization::create([
            'title'=>'Secretaria Execultiva de Gestão e Planejamento',
            'acronym'=>'SEPLAF',
            'filter'=>'secretaria de fundacao e cultura de caruaru',
            'hierarchy'=>'2'
        ]);

        CompanyOrganization::create([
            'title'=>'Núcleo de Inteligência da Saúde',
            'acronym'=>'NIS',
            'filter'=>'gerência do núcleo de inteligência da saúde',
            'hierarchy'=>'5'
        ]);

        CompanyOrganization::create([
            'title'=>'Gerência Financeira',
            'acronym'=>'GFIN',
            'filter'=>'gerência financeira',
            'hierarchy'=>'5'
        ]);

        CompanyOrganization::create([
            'title'=>'Gerência Geral de Gestão',
            'acronym'=>'GGG',
            'filter'=>'gerência geral de gestão',
            'hierarchy'=>'5'
        ]);

        CompanyOrganization::create([
            'title'=>'Gerência de Gestão do Trabalho',
            'acronym'=>'GGT',
            'filter'=>'gerência de gestão do trabalho',
            'hierarchy'=>'5'
        ]);

        CompanyOrganization::create([
            'title'=>'Comissão Permanente de Licitação',
            'acronym'=>'CPL',
            'filter'=>'comisão permanente de licitação',
            'hierarchy'=>'5'
        ]);

        CompanyOrganization::create([
            'title'=>'Gerência de Assistência Farmacêutica',
            'acronym'=>'GAF',
            'filter'=>'gerência de assistência farmacêutica',
            'hierarchy'=>'5'
        ]);

        CompanyOrganization::create([
            'title'=>'Auditoria',
            'acronym'=>'AUD',
            'filter'=>'auditoria',
            'hierarchy'=>'5'
        ]);

        CompanyOrganization::create([
            'title'=>'Coordenação da Ouvidoria',
            'acronym'=>'OUVI',
            'filter'=>'cordenação da ouvidoria',
            'hierarchy'=>'5'
        ]);

        CompanyOrganization::create([
            'title'=>'Núcleo de Educação Permanente',
            'acronym'=>'NEP',
            'filter'=>'núcleo de educação permanente',
            'hierarchy'=>'6'
        ]);

        CompanyOrganization::create([
            'title'=>'Planejamento em Saúde',
            'acronym'=>'PLAN',
            'filter'=>'planejamento em saúde',
            'hierarchy'=>'6'
        ]);

        CompanyOrganization::create([
            'title'=>'Tecnologia da Informação e Comunicação',
            'acronym'=>'TIC',
            'filter'=>'tecnologia da informação e comunicação',
            'hierarchy'=>'6'
        ]);

        CompanyOrganization::create([
            'title'=>'Gerente de Processos e Contratos',
            'acronym'=>'GPC',
            'filter'=>'gerente de processos e contratos',
            'hierarchy'=>'8'
        ]);

        CompanyOrganization::create([
            'title'=>'Coordenação de Compras',
            'acronym'=>'CCOM',
            'filter'=>'coordenação de compras',
            'hierarchy'=>'8'
        ]);

        CompanyOrganization::create([
            'title'=>'Coordenação de Admnistrativa',
            'acronym'=>'COAF',
            'filter'=>'coordenação de admnistrativa',
            'hierarchy'=>'8'
        ]);

        CompanyOrganization::create([
            'title'=>'Coordenação de Transporte',
            'acronym'=>'CTRANS',
            'filter'=>'coordenação de transporte',
            'hierarchy'=>'8'
        ]);

        CompanyOrganization::create([
            'title'=>'Coordenação de Engenharia',
            'acronym'=>'CNEA',
            'filter'=>'coordenação de engenharia',
            'hierarchy'=>'8'
        ]);

        CompanyOrganization::create([
            'title'=>'Gerência de Almoxarifado e Patrimônio',
            'acronym'=>'CALX',
            'filter'=>'gerência de almoxarifado e patrimônio',
            'hierarchy'=>'8'
        ]);

        CompanyOrganization::create([
            'title'=>'Coordenação de Assistência Farmacêutica',
            'acronym'=>'CALX',
            'filter'=>'coordenação de assistência farmacêutica',
            'hierarchy'=>'11'
        ]);

    }
}
