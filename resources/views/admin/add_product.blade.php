@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm sản phẩm
                    </header>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div style="color: red;font-size:15px">
                                {{ Session::get('message') }}
                                @php Session::put('message', null); @endphp
                            </div>
                        @endif
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/save_product')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                
                                <label for="category">Danh mục sản phẩm</label>
                                <select name="category_id" class="form-control">
                                    @foreach($category_product as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                
                                <label for="brand">Thương hiệu Sản phẩm</label>
                                <select name="brand_id" class="form-control">
                                    @foreach($brand_product as $brand)
                                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label  for="exampleInputPassword1">Mô tả Sản phẩm</label>
                                <textarea style="resize: none" rows=5 type="text" name="product_description" class="form-control" id="exampleInputPassword1" placeholder="mô tả sản phẩm"></textarea>
                            </div>
                            <div class="form-group">
                                <label  for="exampleInputPassword1">Chi Tiết Sản phẩm</label>
                                <textarea style="resize: none" rows=5 type="text" name="product_content" class="form-control" id="exampleInputPassword1" placeholder="chi tiết sản phẩm"></textarea>
                            </div>
                            <div class="form-group">
                                <label  for="exampleInputPassword1">Giá Sản phẩm</label>
                                <input style="resize: none" rows=5 type="text" name="product_price" class="form-control" id="exampleInputPassword1" placeholder="giá sản phẩm">
                                </input>
                            </div>
                            <div class="form-group">
                                <label  for="exampleInputPassword1">Ảnh Sản phẩm</label>
                                <input style="resize: none" rows=5 type="file" name="product_image" class="form-control" id="exampleInputPassword1" placeholder="Ảnh sản phẩm">
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển Thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển Thị</option>
                                    
                                </select>
                            </div>
                            
                            <button type="submit" name="add_product" class="btn btn-info">Thêm Sản Phẩm</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
        
    </div>
@endsection
