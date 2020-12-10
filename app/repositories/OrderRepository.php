<?php

namespace App\repositories;

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
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    /**
     * Save Order on DB
     * @param $data
     * @return Order
     */
    public function save($data)
    {

        $this->order->customer_name = $data['customer_name'];
        $this->order->customer_mail = $data['customer_mail'];
        $this->order->customer_mobile = $data['customer_mobile'];
        $this->order->product_id = $data['product_id'];
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
