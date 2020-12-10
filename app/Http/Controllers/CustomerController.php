<?php

namespace App\Http\Controllers;

use App\services\OrderService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * Show a view to create new order
     * @return Illuminate\View
     */
    public function createOrder()
    {
        return view("customer.create");
    }
    /**
     * Invoke service to validate data and save on DB a new order
     * @pararm Request
     */
    public function saveOrder(Request $request)
    {
        $this->orderService->saveOrderData($request);
    }
    /**
     * Show a view with user's orders
     */
    public function viewMyOrders()
    {
    }
    /**
     * 
     */
    public function viewOrderSummary()
    {
    }
    /**
     * 
     */
    public function reviewOrderStatus()
    {
    }
}
