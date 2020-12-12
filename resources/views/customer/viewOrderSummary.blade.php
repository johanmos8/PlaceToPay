@extends('layouts.template')

@section('title', 'Home')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif
    <link rel="stylesheet" href="{{ asset('css/home/index.css') }}" />
    <div id="container">
        <!-- Start	Product details -->
        <div class="product-details">
            <!-- 	Product Name -->
            <h1>{{ $product->name }}</h1>
            <p class="information">{{ $product->description }}</p>
            <!-- 		Control -->
            <div class="control">
            </div>

        </div>

        <!-- 	End	Product details   -->
        <!-- 	Start product image & Information -->
        <div class="product-image">
            <img src="{{ asset($product->image) }}" alt="Omar Dsoky">
        </div>
    </div>
    <form method="POST" class="form-inline" action="{{ route('customer.save') }}">
        @csrf
        <div>
            <label>Customer name</label>
            <input readonly type="text" name="customer_name" value="{{ $request->customer_name }}">
        </div>
        <div>
            <label>Customer email</label>
            <input readonly type="email" name="customer_email" value="{{ $request->customer_email }}">
        </div>
        <div>
            <label>Customer mobile</label>
            <input readonly type="text" name="customer_mobile" value="{{ $request->customer_mobile }}">
            <input readonly type="hidden" name="product_id" value="{{ $request->product_id }}">

        </div>
        <button type="submit">@lang('frontend.btn_go_to_pay')</button>
    </form>
@endsection
