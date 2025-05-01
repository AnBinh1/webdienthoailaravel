@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt Kê Thương Hiệu Sản Phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        @if(Session::has('message'))
            <div style="color: red;font-size:15px">
                {{ Session::get('message') }}
                @php Session::put('message', null); @endphp
            </div>
        @endif

        <table class="table table-striped b-t b-light">
          <thead>
            
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  
                </label>
              </th>
              <th>Tên Thương Hiệu</th>
              <th>Mô Tả</th>
              <th>Hiển Thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_brand_product as $key=> $cate_pro)
              <tr>
                <td><label class="i-checks m-b-none"></label></td>
                <td>{{ $cate_pro ->brand_name}}</td>
                <td><span class="text-ellipsis">{{ $cate_pro ->brand_description}}</span></td>
                <td>
                  @if ($cate_pro->brand_status == 0)
                  
                  {{-- <a href="{{ URL::to('/unactive-category-product/' . $cate_pro->category_id) }}">
                      <span style="font-size: 20px; color: blue" class="fa-thumbs-styling fa fa-thumbs-up"></span>
                  </a> --}}
                  <span>Ẩn</span>
              @else
                  {{-- <a href="{{ URL::to('/active-category-product/' . $cate_pro->category_id) }}">
                      <span style="font-size: 20px; color: red" class="fa-thumbs-styling fa fa-thumbs-down"></span>
                  </a> --}}
                  <span>Hiển thị</span>
                  @endif
              </td>
                <td>
                  <a href="{{URL::to('/edit_brand_product/'. $cate_pro->brand_id)}}" class="btn btn-sm btn-warning">sửa</a>
                  <a onclick="return confirm('Are you sure to delete')" href="{{URL::to('/delete_brand_product/'. $cate_pro->brand_id)}}" class="btn btn-sm btn-danger">xoá</a>
                </td>
              </tr>
            @endforeach
            
            
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
