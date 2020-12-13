@extends('layouts.template')

@section('title', trans('frontend.createNewOrder'))

@section('content')

    </form>
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">@lang('frontend.productInformationTitle')</h3>
                    <div class="max-w-xs rounded overflow-hidden shadow-lg my-2">
                        <img class="w-full" src="{{ asset($product->image) }}">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                            <p class="text-grey-darker text-base">
                                {{ $product->description }}
                            </p>
                            <div class="font-bold text-xl mb-2">{{ $product->price }}</div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="POST" class="m-4 flex" action="{{ route('customer.viewOrderSummary') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="customer_name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="customer_name" id="customer_name" autocomplete="given-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="customer_email" class="block text-sm font-medium text-gray-700">Email
                                        address</label>
                                    <input type="text" name="customer_email" id="customer_email" autocomplete="email"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>


                                <div class="col-span-6">
                                    <label for="customer_mobile" class="block text-sm font-medium text-gray-700">Phone
                                        number</label>
                                    <input type="text" name="customer_mobile" id="customer_mobile"
                                        autocomplete="street-address"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>


                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                @lang('frontend.btn_send_order') </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
@endsection
