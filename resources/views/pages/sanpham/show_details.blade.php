@extends('layout')
@section('content')


<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{ asset('public/uploads/product/'.$product->product_image) }}" alt="" />
            
        </div>
        
    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{ $product->product_name }}</h2>
            <h4 style="color: rgb(216, 136, 15)">Giá: {{ number_format($product->product_price) }} VNĐ</h4>
            
           <form action="{{URL::to('/save_cart')}}" method="POST">
            {{csrf_field()}}
                <span>
                    <label>Quantity:  </label>
                    <input name="qty" type="number" min="1" value="1" width="10px">
                    <input name="productId_hidden" type="hidden"  value="{{ $product->product_id }}" >
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>
            </span>
           </form>
            <h5>Tình trạng: còn hàng</h5>
            <h5>Điều kiện: hàng mới 100%</h5> 
            <h4>Danh mục: {{ $product->category_name }}</h4>
            <h4>Thương hiệu: {{ $product->brand_name }}</h4>
            
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#companyprofile" data-toggle="tab">Mô Tả Sản Phẩm</a></li>
            <li><a href="#details" data-toggle="tab">Chi Tiết Sản Phẩm</a></li>
            <li ><a href="#reviews" data-toggle="tab">Đánh Giá</a></li>
            

        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade  active in" id="companyprofile" >
            <p>{{$product->product_description }}</p>            
        </div>
        <div class="tab-pane fade " id="details" >
            <p>{{$product->product_content }}</p>           
        </div>
        
       
        <div class="tab-pane fade" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>
                
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->


@endsection