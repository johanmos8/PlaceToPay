<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "customer_name" => 'Test',
            "customer_email" => "test@evertec.com",
            "customer_mobile" => "3224561236",
            'process_url'=>'https://test.placetopay.com/redirection/session/436932/09f26d4cfda755e16c3a8d90d277e898',
            "product_id" => '1',
            "user_id" => '1',
            'status'=>'PAYED'

        ];
    }
}
