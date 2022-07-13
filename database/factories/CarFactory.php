<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'make' => $this->faker->name(),
            'image' => ''.rand(1,5).'.jpg',
            'màu' => $this->faker->paragraph(),
            'hãng' => $this->faker->name(),
            'manufactures_id' =>''.rand(1,10),
            'produced_on' => now(),
            // 'manufacturer_id' =>enableForeignKeyConstraints(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
           
        ];
    }
}
