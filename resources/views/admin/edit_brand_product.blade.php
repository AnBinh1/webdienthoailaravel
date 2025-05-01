@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div style="color: red;font-size:15px">
                            {{ Session::get('message') }}
                            @php Session::put('message', null); @endphp
                        </div>
                    @endif

                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update_brand_product/'.$edit_brand_product->brand_id)}}" method="post">

                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <!-- Truy cập trực tiếp thuộc tính của đối tượng -->
                                <input type="text" value="{{$edit_brand_product->brand_name}}" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <!-- Truy cập mô tả của danh mục -->
                                <textarea style="resize: none" rows="5" name="brand_description" class="form-control" id="exampleInputPassword1" placeholder="mô tả thương hiệu">{{$edit_brand_product->brand_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" >Hiển Thị</label>
                                <select name="brand_status" class="form-control input-sm m-bot15" {{$edit_brand_product->brand_status}}>
                                    <option value="0" >Ẩn</option>
                                    <option value="1" >Hiển Thị</option>
                                    
                                </select>
                            </div>
                            <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật Danh Mục</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
