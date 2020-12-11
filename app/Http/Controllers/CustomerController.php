<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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
    public function createOrder($product, ProductService $productService)
    {
        $product = $productService->getProductById($product);
        return view("customer.createOrder", compact('product'));
    }
    /**
     * Invoke service to validate data and save on DB a new order
     * @pararm Request
     */
    public function saveOrder(Request $request)
    {

        
        $this->order = $this->orderService->saveOrderData($request->all(), $request->User()->id);
        //return redirect()->route('customer.viewOrderSummary', $this->order);
    }
    /**
     * Show a view with user's orders
     */
    public function viewMyOrders()
    {
        $order = $this->orderService;
    }
    /**
     * 
     */
    public function viewOrderSummary(Request $request, ProductService $productService)
    {
        $product = $productService->getProductById($request['product_id']);

        return view("customer.viewOrderSummary", compact('product'), compact('request'));
    }
    /**
     * 
     */
    public function reviewOrderStatus($id_order)
    {
        $order = $this->orderService->getOrderById($id_order);
    }
}
