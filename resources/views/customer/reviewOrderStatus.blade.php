@extends('layouts.template')

@section('title', 'Home')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                @lang('frontend.orderInformation') </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Details of your order
            </p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        @lang('frontend.name') </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $order->customer_name }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        @lang('frontend.email')
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $order->customer_email }}
                    </dd>
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        @lang('frontend.phone_number') </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $order->customer_mobile }}
                    </dd>
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        @lang('frontend.paymentStatus') </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $paymentStatus }}
                    </dd>
                </div>
                @if ($order->status == 'PAYED')
                    <div class="bg-green-300 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            @lang('frontend.status') </dt>

                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $order->status }}
                        </dd>
                        </dd>
                    </div>
                @elseif($order->status=='CREATED')
                    <div class="bg-yellow-300 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            @lang('frontend.status') </dt>

                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $order->status }}
                        </dd>
                        </dd>
                    </div>
                @elseif($order->status=='REJECTED')
                    <div class="bg-red-300 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            @lang('frontend.status') </dt>

                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $order->status }}
                        </dd>
                        </dd>
                    </div>
                @endif
             
            </dl>
        </div>
        @if ($order->status == 'CREATED' && $order->process_url)

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <a href="{{ $order->process_url }}"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    @lang('frontend.retryPayment') </a>
            </div>
        @elseif($order->status=='REJECTED')
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <a href="{{ route('customer.create', $order->product_id) }}"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    @lang('frontend.tryAgain') </a>
            </div>

        @endif


    @endsection
