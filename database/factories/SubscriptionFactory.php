<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subscription;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Subscription::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'author_id' => \App\Models\User::factory(),
        ];
    }
}
