@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm Thương hiệu sản phẩm
                    </header>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div style="color: red;font-size:15px">
                                {{ Session::get('message') }}
                                @php Session::put('message', null); @endphp
                            </div>
                        @endif
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/save_brand_product')}}" method="post">
                                {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                            </div>
                            <div class="form-group">
                                <label  for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea style="resize: none" rows=5 type="text" name="brand_description" class="form-control" id="exampleInputPassword1" placeholder="mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển Thị</label>
                                <select name="brand_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển Thị</option>
                                    
                                </select>
                            </div>
                            
                            <button type="submit" name="add_brand_product" class="btn btn-info">Thêm Danh Mục</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
        
    </div>
@endsection
