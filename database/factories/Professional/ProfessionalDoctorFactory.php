<?php

namespace Database\Factories\Professional;

use App\Models\Professional\ProfessionalDoctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessionalDoctorFactory extends Factory
{
    // Define o modelo relacionado a esse factory
    protected $model = ProfessionalDoctor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $specialties = ['Clínico Geral', 'Pediatra', 'Cardiologista', 'Neurologista', 'Ortopedista', 'Ginecologista', 'Oftalmologista'];

        return [
            'name' => $name, // Nome do médico
            'filter' => strtolower($name), // Filtro ou código de identificação
            'crm' => $this->faker->unique()->numberBetween(100000, 999999), // CRM único
            'specialty' => $this->faker->randomElement($specialties), // Especialidade médica (escolhida aleatoriamente da lista)
            'contact_1' => $this->faker->phoneNumber(), // Primeiro contato (telefone)
            'contact_2' => $this->faker->optional()->phoneNumber(), // Segundo contato (opcional)
        ];
    }
}
