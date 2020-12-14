<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class OrderService
{
    /**
     * @var OrderRepository
     */
    public $orderRepository;

    /**
     * OrderRepository constructor
     * @param Order $order
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    /**
     * Validate order data and save on DB if there is not errors
     * @param array $data 
     * @return String
     */
    public function saveOrderData($data,$user_id)
    {
        $validator = Validator::make($data, [
            'customer_name' => 'required|max:80',
            'customer_email' => 'required|email|max:120',
            'customer_mobile' => 'required|max:40'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        return $this->orderRepository->save($data,$user_id);
    }
    /**
     * Function to validate order id and return the response
     */
    public function getOrderById($id_order)
    {
        return $this->orderRepository->getOrderById($id_order);
    }
    public function getAllMyOrders(){
        
    }
}
