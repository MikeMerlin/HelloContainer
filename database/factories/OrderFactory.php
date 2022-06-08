<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bl_release_date' => now(),
            'bl_release_user_id' => \App\Models\User::all()->random()->id,
            'freight_payer_self' => false,
            'contract_number' => Str::random(10),
            'bl_number' => Str::random(10),
        ];
    }
}
