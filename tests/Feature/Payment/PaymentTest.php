<?php

namespace Tests\Feature\Payment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class PaymentTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    /**
     * Test if the home view can be rendered
     *
     * @return void
     */
    public function test_a_home_view_can_be_rendered()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $products = Product::all();
        $view = $this->view("home.index", compact('products'));

        $view->assertSee('List of products');
    }
    /**
     * Test if create order view can be showed
     */
    public function test_a_create_order_view_can_be_rendered()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $product = Product::first();
        $view = $this->view("customer.createOrder", compact('product'));

        $view->assertSee('Send order');
    }
    /**
     * 
     * Test if view that render orders by user is loaded
     */
    public function test_my_orders_view_can_be_rendered()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $ordersList = Order::all();
        $view = $this->view("customer.viewMyOrders", compact('ordersList'));

        $view->assertSee('Order status');
    }
    /**
     * test navigation after the user try to create new order. It must to redirect to order summary
     * @test
     */

    public function test_redirect_to_review_order_before_to_pay()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $product = Product::factory()->create();
        //Request to create order with product id and user logged
        $response = $this->followingRedirects()->post(
            'customer/orderSummary',
            [
                "customer_name" => $user->name,
                "customer_email" => "test@evertec.com",
                "customer_mobile" => "3224561236",
                "product_id" => $product->id,
                "user_id" => $user->id

            ]
        )->assertStatus(200);
    }
    /**
     * Test if order has pending status so view shows retry payment button 
     */
    public function test_render_retry_payment_when_order_pending()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $user = Order::factory()->create(['status' => 'CREATED']);

        $order = Order::first();
        $paymentStatus = 'PENDING';
        $view = $this->view("customer.reviewOrderStatus", compact('order', 'paymentStatus'));

        $view->assertSee('Retry payment');
    }
    /**
     * Test if order was payed, view doesnt show retry payment button 
     */
    public function test_not_to_render_retry_payment_when_order_payed()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $user = Order::factory()->create(['status' => 'PAYED']);
        $order = Order::first();
        $paymentStatus = 'APPROVED';
        $view = $this->view("customer.reviewOrderStatus", compact('order', 'paymentStatus'));
        $view->assertDontSee('Retry payment');
    }
    /**
     * Test if order was rejected, view shows try again button to create new order
     */
    public function test_render_try_again_when_order_rejected()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $user = Order::factory()->create(['status' => 'REJECTED']);
        $order = Order::first();
        $paymentStatus = 'REJECTED';
        $view = $this->view("customer.reviewOrderStatus", compact('order', 'paymentStatus'));
        $view->assertSee('Try again!');
    }
}
