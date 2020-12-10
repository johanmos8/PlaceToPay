<?php

namespace App\services;

use App\Models\Order;
use App\repositories\OrderRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class OrderService
{
    /**
     * @var Order
     */
    protected $orderRepository;

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
    public function saveOrderData($data)
    {
        $validator = Validator::make($data, [
            'customer_name' => 'required|max:80',
            'customer_mail' => 'required|max:120',
            'customer_mobile' => 'required|email|max:40'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        return $this->orderRepository->save($data);
    }
}
