@extends('layouts.template')

@section('title', trans('frontend.products_list'))

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home/index.css') }}" />
    @foreach ($products as $product)
    <div class="py-6">
        <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
          <div class="w-1/3 bg-cover" style="background-image: url('{{ asset($product->image) }}')">
          </div> 
          <div class="w-2/3 p-4">
            <h1 class="text-gray-900 font-bold text-2xl">{{ $product->name }}</h1>
            <p class="mt-2 text-gray-600 text-sm">{{ $product->description }}</p>
            <div class="flex item-center mt-2">
              <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
              </svg>
              <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
              </svg>
              <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
              </svg>
              <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
              </svg>
              <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
              </svg>
            </div>
            <div class="flex item-center justify-between mt-3">
            <h1 class="text-gray-700 font-bold text-xl">{{ $product->price }}</h1>
              <a  class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded" href="{{route("customer.create",$product->id)}}" class="buy">@lang('frontend.btn_to_buy')</a>

            </div>
          </div>
        </div>
      </div>
    @endforeach
@endsection
