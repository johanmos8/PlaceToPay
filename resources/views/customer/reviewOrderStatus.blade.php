@extends('layouts.template')

@section('title', 'Home')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif
    <link rel="stylesheet" href="{{ asset('css/home/index.css') }}" />

    <form method="POST" class="form-inline" action="{{ route('customer.save') }}">
        @csrf
        <div>
            <label>Customer name</label>
            <input readonly type="text" name="customer_name" value="{{ $order->customer_name }}">
        </div>
        <div>
            <label>Customer email</label>
            <input readonly type="email" name="customer_email" value="{{ $order->customer_email }}">
        </div>
        <div>
            <label>Customer mobile</label>
            <input readonly type="text" name="customer_mobile" value="{{ $order->customer_mobile }}">
            {{-- <input readonly type="hidden" name="product_id" value="{{ $request->product_id }}"> --}}
            <input readonly type="text" name="status" value="{{ $order->status }}">
        </div>
        <button type="submit">@lang('frontend.btn_go_to_pay')</button>
    </form>
@endsection
