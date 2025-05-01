@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật sản phẩm
                    </header>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div style="color: red;font-size:15px">
                                {{ Session::get('message') }}
                                @php Session::put('message', null); @endphp
                            </div>
                        @endif
                        <div class="position-center">
                            @foreach ($edit_product as $key => $pro)
                            <form role="form" action="{{URL::to('/update_product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                            </div>
                            <div class="form-group">
                                
                                <label for="category">Danh mục sản phẩm</label>
                                <select name="category_id" class="form-control">
                                    @foreach($category_product as $category)
                                    @if ($category->category_id == $pro->category_id)

                                            <option selected value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                        @else
                                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                
                                <label for="brand">Thương hiệu Sản phẩm</label>
                                <select name="brand_id" class="form-control">
                                    @foreach($brand_product as $brand)
                                    @if ($brand->brand_id == $pro->brand_id)

                                        <option selected value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                    @else
                                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                    @endif
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label  for="exampleInputPassword1">Mô tả Sản phẩm</label>
                                <textarea style="resize: none" rows=5 type="text" name="product_description" class="form-control" id="exampleInputPassword1" >{{$pro->product_description}}</textarea>
                                    
                            </div>
                            <div class="form-group">
                                <label  for="exampleInputPassword1">Chi Tiết Sản phẩm</label>
                                <textarea style="resize: none" rows=5 type="text" name="product_content" class="form-control" id="exampleInputPassword1" >{{$pro->product_content}}</textarea>
                                
                            </div>
                            <div class="form-group">
                                <label  for="exampleInputPassword1">Giá Sản phẩm</label>
                                <input style="resize: none" rows=5 type="text" name="product_price" class="form-control" id="exampleInputPassword1" value="{{$pro->product_price}}">
                                </input>
                            </div>
                            <div class="form-group">
                                <label  for="exampleInputPassword1">Ảnh Sản phẩm</label>
                                <input type="file" name="product_image" class="form-control">

                                <img width="100px" height="100px" src="{{URL::to('public/uploads/product/',$pro->product_image)}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển Thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0" {{ $pro->product_status == 0 ? 'selected' : '' }}>Ẩn</option>
                                    <option value="1" {{ $pro->product_status == 1 ? 'selected' : '' }}>Hiển thị</option>
                                </select>
                                
                            </div>
                            
                            <button type="submit" name="all_product" class="btn btn-info">cập nhật Sản Phẩm</button>
                            </form>
                            @endforeach
                        </div>

                    </div>
                </section>

        </div>
        
    </div>
@endsection
