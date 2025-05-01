@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
                </header>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div style="color: red;font-size:15px">
                            {{ Session::get('message') }}
                            @php Session::put('message', null); @endphp
                        </div>
                    @endif

                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update_category_product/'.$edit_category_product->category_id)}}" method="post">

                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <!-- Truy cập trực tiếp thuộc tính của đối tượng -->
                                <input type="text" value="{{$edit_category_product->category_name}}" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả Danh Mục</label>
                                <!-- Truy cập mô tả của danh mục -->
                                <textarea style="resize: none" rows="5" name="category_description" class="form-control" id="exampleInputPassword1" placeholder="mô tả danh mục">{{$edit_category_product->category_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" >Hiển Thị</label>
                                <select name="category_status" class="form-control input-sm m-bot15" {{$edit_category_product->category_status}}>
                                    <option value="0" >Ẩn</option>
                                    <option value="1" >Hiển Thị</option>
                                    
                                </select>
                            </div>
                            <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật Danh Mục</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
