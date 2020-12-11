@extends('layouts.template')

@section('title', 'Home')

@section('content')
<form method="POST" action="{{route("customer.create")}}">
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
            <input type="text" name="customer_mobile">
        </div>
    <button type="submit">@lang('frontend.btn_send_order')</button>
    </form>
@endsection
