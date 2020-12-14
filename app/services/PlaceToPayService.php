<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Dnetix\Redirection\PlacetoPay;
use Dnetix\Redirection\Exceptions\PlacetoPayException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Throw_;
use PhpParser\Node\Stmt\Switch_;
use Throwable;

class PlaceToPayService
{
    /**
     * 
     */
    protected $placetopay;
    protected $orderRepository;
    /**
     * 
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->placetopay = new PlacetoPay([
            'login' => env('PLACETOPAY_LOGIN', '6dd490faf9cb87a9862245da41170ff2'),
            'tranKey' => env('PLACETOPAY_TRANKEY', '024h1IlD'),
            'url' => env('PLACETOPAY_ENDPOINT', 'https://test.placetopay.com/redirection/'),
            'rest' => [
                'timeout' => 45, // (optional) 15 by default
                'connect_timeout' => 30, // (optional) 5 by default
            ]
        ]);
    }
    /**
     * Get process url to redirect to payment gateway
     * @param $order, $product
     */
    public function createRequest($order, $product)
    {
        $requestptp = [
            "locale" => "en_CO",
            "buyer" => [
                "name" => $order->customer_name,
                "surname" => '',
                "email" => $order->customer_email,
                "mobile" => $order->customer_mobile,
            ],
            'payment' => [
                'reference' => $order->id,
                'description' => $product->description,
                'amount' => [
                    'currency' => 'USD',
                    'total' => $product->price,
                ],
                "allowPartial" => false
            ],
            'expiration' => date('c', strtotime('+1 days')),
            'returnUrl' => route("customer.reviewOrder", $order->id),
            'ipAddress' => '127.0.0.1',
            //'userAgent' => $request->user_agent,
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];
        $response = $this->placetopay->request($requestptp);
        if ($response->isSuccessful()) {
            $order = $this->orderRepository->updatePaymentData($order, $response);
            return $response;
        } else {
            
            Log::info($response->status()->message());
            throw new Exception('Something Went Wrong. Please try again or contact our support area'); 
            //return redirect()->route('customer.reviewOrder', $order)->with('status', $response->status()->message());
        }
    }
    /**
     * Get information of payment by request id
     */
    public function getRequestInformation($order)
    {
        $response = $this->placetopay->query($order->request_id);
        if ($response->isSuccessful()) {

            switch ($response->status()->status()) {

                case 'OK':
                    $order->status = 'CREATED'; // The payment was received
                    break;
                case 'FAILED':
                    $order->status = 'CREATED'; // The payment has failed
                    break;
                case 'APPROVED':
                    $order->status = 'PAYED';  // The payment was payed
                    break;
                case 'PENDING':
                    $order->status = 'CREATED'; // The payment pending approval
                    break;
                case 'REJECTED':
                    $order->status = 'REJECTED'; // The payment was rejected
                    break;
                case 'PENDING_VALIDATION':
                    $order->status = 'CREATED'; // The payment has been approved
                    break;
            }
            $this->orderRepository->update($order);

            return array('order'=>$order,'paymentStatus'=>$response->status()->status());
        } else {
            // There was some error with the connection so check the message
            Log::info($response->status()->message());
            throw new Exception('Something Went Wrong. Please try again or contact our support area'); 
        }
    }
}
