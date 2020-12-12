@extends('layouts.template')

@section('title', 'Home')

@section('content')
    <form method="POST" class="form-inline" action="{{ route('customer.viewOrderSummary') }}">
        @csrf
        <div>
            <label>Customer name</label>
            <input type="text" name="customer_name">
        </div>
        <div>
            <label>Customer email</label>
            <input type="email" name="customer_email">
        </div>
        <div>
            <label>Customer mobile</label>
            <input type="tel" name="customer_mobile">            
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
        </div>
        <button type="submit">@lang('frontend.btn_send_order')</button>
    </form>
@endsection
