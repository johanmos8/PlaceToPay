<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order;


class OrderTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    /**
     * validate create order succesfully
     * @test
     */

    public function test_create_order_sucessfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $product = Product::factory()->create();
        //Request to create order with product id and user logged
        $response = $this->post(
            'customer/save',
            [
                "customer_name" => $user->name,
                "customer_email" => "test@evertec.com",
                "customer_mobile" => "3224561236",
                "product_id" => $product->id,
                "user_id" => $user->id

            ]
        )->assertRedirect()
            ->assertSessionHasNoErrors();
        // Check new order in the database whit user_id
        $this->assertDatabaseHas('orders', [
            "user_id" => $user->id,
            "product_id" => $product->id
        ]);
        $this->assertDatabaseCount('orders', 1);
    }
    /**
     * test that exist process url to redirect after order was created, so the placetopay service is working
     * @test
     */

    public function test_get_process_url_for_order()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $product = Product::factory()->create();
        //Request to create order with product id and user logged
        $response = $this->post(
            'customer/save',
            [
                "customer_name" => $user->name,
                "customer_email" => "test@evertec.com",
                "customer_mobile" => "3224561236",
                "product_id" => $product->id,
                "user_id" => $user->id

            ]
        )->assertRedirect()
            ->assertSessionHasNoErrors();
        $order = Order::first();
        $this->assertNotNull($order->process_url);
    }
    /**
     * Test that new order created has a status column equals to "CREATED"
     */
    public function test_validate_status_created()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $product = Product::factory()->create();
        //Request to create order with product id and user logged
        $response = $this->post(
            'customer/save',
            [
                "customer_name" => $user->name,
                "customer_email" => "test@evertec.com",
                "customer_mobile" => "3224561236",
                "product_id" => $product->id,
                "user_id" => $user->id

            ]
        )->assertRedirect()
            ->assertSessionHasNoErrors();
        $order = Order::first();
        $this->assertEquals($order->status, 'CREATED');
    }
 

}
