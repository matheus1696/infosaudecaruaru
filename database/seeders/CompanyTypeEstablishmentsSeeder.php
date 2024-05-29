<?php

namespace Database\Seeders;

use App\Models\Company\CompanyTypeEstablishment;
use Illuminate\Database\Seeder;

class CompanyTypeEstablishmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CompanyTypeEstablishment::create(['id'=>2, 'title'=>'Centro de Saude/Unidade Basica', ]);
        CompanyTypeEstablishment::create(['id'=>4, 'title'=>'Policlinica', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>73, 'title'=>'Pronto Atendimento', ]);
        CompanyTypeEstablishment::create(['id'=>68, 'title'=>'Central de Gestao em Saude', ]);
        CompanyTypeEstablishment::create(['id'=>1, 'title'=>'Posto de Saude', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>-1, 'title'=>'Outros', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>15, 'title'=>'Unidade Mista', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>32, 'title'=>'Unidade Móvel Fluvial', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>36, 'title'=>'Clinica/Centro de Especialidade', ]);
        CompanyTypeEstablishment::create(['id'=>40, 'title'=>'Unidade Movel Terrestre', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>71, 'title'=>'Centro de Apoio à Saúde da Família', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>72, 'title'=>'Unidade de Atenção à Saúde Indígena', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>74, 'title'=>'Polo Academia Da Saude', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>5, 'title'=>'Hospital Geral', ]);
        CompanyTypeEstablishment::create(['id'=>7, 'title'=>'Hospital Especializado', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>20, 'title'=>'Pronto Socorro Geral', ]);
        CompanyTypeEstablishment::create(['id'=>21, 'title'=>'Pronto Socorro Especializado', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>62, 'title'=>'Hospital/Dia - Isolado', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>69, 'title'=>'Centro de Atencao Hemoterapia e ou Hematologica', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>77, 'title'=>'Serviço de Atenção Domiciliar Isolado(Home Care)', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>22, 'title'=>'Consultório Isolado', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>39, 'title'=>'Unidade de Apoio Diagnose e Terapia (Sadt Isolado)', ]);
        CompanyTypeEstablishment::create(['id'=>42, 'title'=>'Unidade Movel de Nivel Pre-Hospitalar na Area de Urgencia', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>43, 'title'=>'Farmacia', ]);
        CompanyTypeEstablishment::create(['id'=>50, 'title'=>'Unidade de Vigilancia em Saude', ]);
        CompanyTypeEstablishment::create(['id'=>60, 'title'=>'Cooperativa', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>61, 'title'=>'Centro de Parto Normal - Isolado', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>64, 'title'=>'Central de Regulação de Serviços de Saúde', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>67, 'title'=>'Laboratório Central de Saúde Pública Lacen', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>70, 'title'=>'Centro de Atencao Psicossocial', ]);
        CompanyTypeEstablishment::create(['id'=>75, 'title'=>'Telessaúde', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>76, 'title'=>'Central de Regulacao Medica das Urgencias', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>78, 'title'=>'Unidade de Atenção em Regime Residencial', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>79, 'title'=>'Oficina Ortopédica', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>80, 'title'=>'Laboratorio de Saude Publica', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>81, 'title'=>'Central de Regulacao Do Acesso',]);
        CompanyTypeEstablishment::create(['id'=>82, 'title'=>'Central de Notificacao,Captacao e Distribuição de Orgaos Estadual', 'status'=>false]);
        CompanyTypeEstablishment::create(['id'=>85, 'title'=>'Centro De Imunizacao', 'status'=>false]);
    }
}
