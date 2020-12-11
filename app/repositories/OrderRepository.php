<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    /**
     * @var Order
     */
    protected $order;

    /**
     * OrderRepository constructor
     * @param Order $order
     */
    public function __construct(Order $order=null)
    {
        $this->order = $order;
    }
    /**
     * Save Order on DB
     * @param $data
     * @return Order
     */
    public function save($data,$user_id)
    {

        $this->order->customer_name = $data['customer_name'];
        $this->order->customer_email = $data['customer_email'];
        $this->order->customer_mobile = $data['customer_mobile'];
        $this->order->product_id = $data['product_id'];
        $this->order->user_id=$user_id;
        $this->order->save();

        return $this->order;
    }
    /**
     * Get all orders for user
     * @param User
     */
    public function getOrdersForUser()
    {
    }
    /**
     * Find a order by its ID
     * @param $id Order id
     */
    public function getOrderById($id)
    {

        return $this->order::find($id);
    }
}
