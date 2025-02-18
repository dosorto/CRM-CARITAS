<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Migrante;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Migrante>
 */
class MigranteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Migrante::class;

    public function definition(): array
    {
        $sexo = $this->faker->randomElement(['M', 'F']);

        return [
            'primer_nombre' => $sexo === 'M' ? $this->faker->firstNameMale() : $this->faker->firstNameFemale(),
            'segundo_nombre' => $sexo === 'M' ? $this->faker->firstNameMale() : $this->faker->firstNameFemale(),
            'primer_apellido' => $this->faker->lastName(),
            'segundo_apellido' => $this->faker->lastName(),
            'sexo' => $sexo,
            'tipo_identificacion' => $this->faker->randomElement(['DNI', 'Pasaporte']),
            'numero_identificacion' => $this->faker->numerify('#############'),
            'pais_id' => 74,
            'estado_civil' => $this->faker->randomElement(['Soltero/a', 'Casado/a', 'Divorciado/a', 'Viudo/a', 'Unión Libre']),
            'codigo_familiar' => 1,
            'es_lgbt' => 0,
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'tipo_sangre' => $this->faker->randomElement(['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-']),
            'created_by' => 1
        ];
    }
}
