@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản phẩm mới</h2>
    @foreach ($all_product as $product)
    <div class="col-sm-4" >
        <div class="product-image-wrapper" style="height: 500px" >
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{ URL::to('/chi_tiet_san_pham/'.$product->product_id) }}">
                        <img src="{{ asset('public/uploads/product/'.$product->product_image) }}" alt="{{ $product->product_name }}" />
                        <h2>{{ number_format($product->product_price) }} VNĐ</h2>
                        <p>{{ $product->product_name }}</p>
                        
                    </a>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm so sánh</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div><!--features_items-->
@endsection
