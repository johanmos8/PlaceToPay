<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function create_order_with_wrong_data(){

    }
    public function create_order_sucessfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

          //Request to create order with product id and user logged
          $response = $this->actingAs($user)->post('/createOrder', 
          [
              "customer_name"=>"1",
              "customer_email"=>"",
              "customer_mobile"=>"",
              "product_id"=>""
          ]);
  
          //Petition success ?
          $response->assertStatus(302);
           
          // Check new order in the database whit user_id
          $this->assertDatabaseHas('orders',[
              "user_id" => $user->id,
          ]);
    }
    public function retry_payment_sucessfully(){

    }
    public function view_my_orders(){

    }
 
}
