<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Services\PlaceToPayService;
use App\Services\ProductService;
use Dnetix\Redirection\PlacetoPay;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

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
    public function saveOrder(Request $request, ProductService $productService, PlaceToPayService $placeToPayService)
    {
        $this->order = $this->orderService->saveOrderData($request->all(), $request->User()->id);
        $product = $productService->getProductById($request->product_id);
        try {
            $response = $placeToPayService->createRequest($this->order, $product);
            return redirect()->to($response->processUrl())->send();
        } catch (Exception $e) {
            report($e);
            return redirect()->route('customer.viewMyOrders')->with('status', $e->getMessage());
        }
    }
    /**
     * Show a view with user's orders
     */
    public function viewMyOrders()
    {
        $user = Auth::user();
        $ordersList = $user->orders()->get();
        return view("customer.viewMyOrders", compact('ordersList'));
    }
    /**
     * Show a view with information of Order to be payed
     */
    public function viewOrderSummary(Request $request, ProductService $productService)
    {
        $product = $productService->getProductById($request['product_id']);

        return view("customer.viewOrderSummary", compact('product'), compact('request'));
    }
    /**
     * 
     */
    public function reviewOrderStatus($id_order, PlaceToPayService $placeToPayService)
    {
        $objOrder = $this->orderService->getOrderById($id_order);
        try {
            $result = $placeToPayService->getRequestInformation($objOrder);
            $paymentStatus = $result['paymentStatus'];
            $order = $result['order'];
            return view("customer.reviewOrderStatus", compact('order', 'paymentStatus'));
        } catch (Exception $e) {
            report($e);
            return redirect()->route('customer.viewMyOrders')->with('status', $e->getMessage());
        }
    }
}
