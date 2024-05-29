<?php

namespace Database\Seeders;

use App\Models\Medication\Medication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Medication::create(['title'=>'Aciclovir sódico 200mg', 'filter'=>'aciclovir sódico 200mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Aciclovir', 'filter'=>'aciclovir', 'description'=>'', 'medication_unit_id'=>'2', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ácido acetilsalicílico 100mg', 'filter'=>'ácido acetilsalicílico 100mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ácido fólico 5mg', 'filter'=>'ácido fólico 5mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ácido fólico 0,2mg/ml', 'filter'=>'ácido fólico 0,2mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Albendazol 40mg/ml', 'filter'=>'albendazol 40mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Albedazol 400mg', 'filter'=>'albedazol 400mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Alendronato sódico 70mg', 'filter'=>'alendronato sódico 70mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Alopurinol 100mg', 'filter'=>'alopurinol 100mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ambroxol 15mg/5ml (infant.)', 'filter'=>'ambroxol 15mg/5ml (infant.)', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ambroxol 30mg/5ml (adulto)', 'filter'=>'ambroxol 30mg/5ml (adulto)', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Amiodarona 200mg', 'filter'=>'amiodarona 200mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Amoxicilina 250mg/5ml', 'filter'=>'amoxicilina 250mg/5ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Amoxicilina 500mg', 'filter'=>'amoxicilina 500mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ampicilina 500mg', 'filter'=>'ampicilina 500mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ampicilina líq', 'filter'=>'ampicilina líq', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Anlodipino 5mg', 'filter'=>'anlodipino 5mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Anlodipino 10mg', 'filter'=>'anlodipino 10mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Atenolol 25mg', 'filter'=>'atenolol 25mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Atenolol 50mg', 'filter'=>'atenolol 50mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Atenolol 100mg', 'filter'=>'atenolol 100mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Azitromicina 40mg/ml', 'filter'=>'azitromicina 40mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Azitromicina 500mg', 'filter'=>'azitromicina 500mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Bromoprida gts', 'filter'=>'bromoprida gts', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Escopolamina + dipirona gotas 20ml', 'filter'=>'escopolamina + dipirona gotas 20ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Escopolamina + dipirona', 'filter'=>'escopolamina + dipirona', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Captopril 25 mg', 'filter'=>'captopril 25 mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Cefalexina sódica 250mg/5ml', 'filter'=>'cefalexina sódica 250mg/5ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Cefalexina 500mg', 'filter'=>'cefalexina 500mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Cetoconazol 200mg', 'filter'=>'cetoconazol 200mg', 'description'=>'', 'medication_unit_id'=>'2', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Cetoconazol 20mg/g creme', 'filter'=>'cetoconazol 20mg/g creme', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ciprofloxacino 500mg', 'filter'=>'ciprofloxacino 500mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ciclo 21', 'filter'=>'ciclo 21', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Cimetidina 200mg', 'filter'=>'cimetidina 200mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Dexamentasona 4mg', 'filter'=>'dexamentasona 4mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Dexametasona 0,1mg/ml', 'filter'=>'dexametasona 0,1mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Dexametasona creme', 'filter'=>'dexametasona creme', 'description'=>'', 'medication_unit_id'=>'2', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Dexclorferinamina 0,2mg/ml 120ml', 'filter'=>'dexclorferinamina 0,2mg/ml 120ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Dexclorferinamina 2mg', 'filter'=>'dexclorferinamina 2mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Dipirona sódica 500mg/ml', 'filter'=>'dipirona sódica 500mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Dipirona sódica 500mg', 'filter'=>'dipirona sódica 500mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Digoxina 0,25mg', 'filter'=>'digoxina 0,25mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Enalapril 5mg', 'filter'=>'enalapril 5mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Enalapril 10mg', 'filter'=>'enalapril 10mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Enalapril 20mg', 'filter'=>'enalapril 20mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Eritromicina 50mg/ml', 'filter'=>'eritromicina 50mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Espiranolactona 25mg', 'filter'=>'espiranolactona 25mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Espiranolactona 50mg', 'filter'=>'espiranolactona 50mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Espiranolactona 100mg', 'filter'=>'espiranolactona 100mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Fenoterol (berotec)', 'filter'=>'fenoterol (berotec)', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Fluconazol 150mg', 'filter'=>'fluconazol 150mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Furosemida 40mg', 'filter'=>'furosemida 40mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Glibenclamida 5mg', 'filter'=>'glibenclamida 5mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Hidróxido de alumínio', 'filter'=>'hidróxido de alumínio', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Hidróxido de magnésio e alumínio', 'filter'=>'hidróxido de magnésio e alumínio', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Hidroclorotiazida 25mg', 'filter'=>'hidroclorotiazida 25mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ibuprofeno 200mg/5ml', 'filter'=>'ibuprofeno 200mg/5ml', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ibuprofeno 300mg', 'filter'=>'ibuprofeno 300mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ibuprofeno 600mg', 'filter'=>'ibuprofeno 600mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Ipratrópio 0,25mg (atrovent)', 'filter'=>'ipratrópio 0,25mg (atrovent)', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Levonogestrel 1,5mg', 'filter'=>'levonogestrel 1,5mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Loratadina 1mg/ml', 'filter'=>'loratadina 1mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Loratadina 10mg', 'filter'=>'loratadina 10mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Losartana 50mg', 'filter'=>'losartana 50mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Lubrificante', 'filter'=>'lubrificante', 'description'=>'', 'medication_unit_id'=>'7', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Menbendazol', 'filter'=>'menbendazol', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Menbendazol', 'filter'=>'menbendazol', 'description'=>'', 'medication_unit_id'=>'6', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Medroxiprogesterona 150mg/ml', 'filter'=>'medroxiprogesterona 150mg/ml', 'description'=>'', 'medication_unit_id'=>'5', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Metildopa 250mg', 'filter'=>'metildopa 250mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Metildopa 500mg', 'filter'=>'metildopa 500mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Metformina 500mg', 'filter'=>'metformina 500mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Metformina 850mg', 'filter'=>'metformina 850mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Metoclopramida 4mg/ml', 'filter'=>'metoclopramida 4mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Metoclopramida 10mg', 'filter'=>'metoclopramida 10mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Metronidazol 40mg/ml (benzolmetronidazol)', 'filter'=>'metronidazol 40mg/ml (benzolmetronidazol)', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Metronidazol 10% (100mg/g) gel vaginal', 'filter'=>'metronidazol 10% (100mg/g) gel vaginal', 'description'=>'', 'medication_unit_id'=>'2', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Metronidazol 250mg', 'filter'=>'metronidazol 250mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Metronidazol 400mg', 'filter'=>'metronidazol 400mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Neomicina + bacitracina', 'filter'=>'neomicina + bacitracina', 'description'=>'', 'medication_unit_id'=>'2', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Nitrato de miconazol 2%', 'filter'=>'nitrato de miconazol 2%', 'description'=>'', 'medication_unit_id'=>'2', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Nitrato de miconazol creme vaginal', 'filter'=>'nitrato de miconazol creme vaginal', 'description'=>'', 'medication_unit_id'=>'2', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Nistatina 100.000UI/ml', 'filter'=>'nistatina 100.000ui/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Nistatina vaginal', 'filter'=>'nistatina vaginal', 'description'=>'', 'medication_unit_id'=>'2', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Nifedipino 10mg', 'filter'=>'nifedipino 10mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Nifedipino 20mg', 'filter'=>'nifedipino 20mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Nistatina vaginal', 'filter'=>'nistatina vaginal', 'description'=>'', 'medication_unit_id'=>'2', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Norestisterona', 'filter'=>'norestisterona', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Noregina inj', 'filter'=>'noregina inj', 'description'=>'', 'medication_unit_id'=>'5', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Óleo mineral', 'filter'=>'óleo mineral', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Omeprazol 200mg', 'filter'=>'omeprazol 200mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Páracetamol 200mg/ml', 'filter'=>'páracetamol 200mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Paracetamol 750mg', 'filter'=>'paracetamol 750mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Paracetamol 750 mg', 'filter'=>'paracetamol 750 mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Pasta d’água', 'filter'=>'pasta d’água', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Permetrina 1%', 'filter'=>'permetrina 1%', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Permetrina 5%', 'filter'=>'permetrina 5%', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Prednisona 5mg', 'filter'=>'prednisona 5mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Prednisona 20mg', 'filter'=>'prednisona 20mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Prednisolona 4,02mg/ml', 'filter'=>'prednisolona 4,02mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Propranolol 40mg', 'filter'=>'propranolol 40mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Preservativo masculino', 'filter'=>'preservativo masculino', 'description'=>'', 'medication_unit_id'=>'1', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Preservativo feminino', 'filter'=>'preservativo feminino', 'description'=>'', 'medication_unit_id'=>'1', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Sais para reidratação (oral)', 'filter'=>'sais para reidratação (oral)', 'description'=>'', 'medication_unit_id'=>'1', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Secnidazol 1g', 'filter'=>'secnidazol 1g', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Sulfato de salbutamol 100mcg/ml', 'filter'=>'sulfato de salbutamol 100mcg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Sinvastatina 10mg', 'filter'=>'sinvastatina 10mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Sinvastatina 20mg', 'filter'=>'sinvastatina 20mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Sinvastatina 40mg', 'filter'=>'sinvastatina 40mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Simeticona 40mg', 'filter'=>'simeticona 40mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Simeticona gts', 'filter'=>'simeticona gts', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Sulfametoxazol + trimetoprina 40mg+8mg/ml', 'filter'=>'sulfametoxazol + trimetoprina 40mg+8mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Sulfametoxazol + trimetoprina 40mg+8mg', 'filter'=>'sulfametoxazol + trimetoprina 40mg+8mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Sulfato ferroso 25mg/ml', 'filter'=>'sulfato ferroso 25mg/ml', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Sulfato ferroso 40mg', 'filter'=>'sulfato ferroso 40mg', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Vitamina c comprimido', 'filter'=>'vitamina c comprimido', 'description'=>'', 'medication_unit_id'=>'3', 'medication_type_id'=>'1', ]);
        Medication::create(['title'=>'Vitamina c gts', 'filter'=>'vitamina c gts', 'description'=>'', 'medication_unit_id'=>'4', 'medication_type_id'=>'1', ]);
    }
}
