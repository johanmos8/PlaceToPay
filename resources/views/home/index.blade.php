@extends('layouts.template')

@section('title', 'Home')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home/index.css') }}" />
    @foreach ($products as $product)
        <div id="container">
            <!-- Start	Product details -->
            <div class="product-details">

                <!-- 	Product Name -->
                <h1>{{ $product->name }}</h1>
                <span class="hint-star star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </span>

                <p class="information">{{ $product->description }}</p>

                <!-- 		Control -->
                <div class="control">

                    <!-- Start Button buying -->
                    <button class="btn">
                        <!-- 		the Price -->
                        <span class="price">{{ $product->price }}</span>
                        <!-- 		shopping cart icon-->
                        <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        <!-- 		Buy Now / ADD to Cart-->
                    <a href="{{route("customer.create",$product->id)}}" class="buy">@lang('frontend.btn_to_buy')</a>
                    </button>
                    <!-- End Button buying -->

                </div>

            </div>

            <!-- 	End	Product details   -->



            <!-- 	Start product image & Information -->

            <div class="product-image">

                <img src="{{ asset($product->image) }}" alt="Omar Dsoky">

            </div>

        </div>
    @endforeach
@endsection
