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
    public function __construct(Order $order = null)
    {
        $this->order = $order;
    }
    /**
     * Save Order on DB
     * @param $data
     * @return Order
     */
    public function save($data, $user_id)
    {
        $this->order->customer_name = $data['customer_name'];
        $this->order->customer_email = $data['customer_email'];
        $this->order->customer_mobile = $data['customer_mobile'];
        $this->order->product_id = $data['product_id'];
        $this->order->user_id = $user_id;
        $this->order->save();

        return $this->order;
    }
    /**
     * Let to update all information about order
     * @param $order
     */
    public function update($order)
    {
        $order->save();
    }
    /**
     * Let to update information about payment process using gateway
     * @param $order, $data
     */
    public function updatePaymentData($order, $data)
    {

        $order->request_id = $data->requestId;
        $order->process_url = $data->processUrl;
        $order->save();
        return $order;
    }
    /**
     * Get all orders for user
     * @param User
     */
    public function getOrdersForUser($id_user)
    {
        return Order::where('user_id',$id_user)->get();
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
