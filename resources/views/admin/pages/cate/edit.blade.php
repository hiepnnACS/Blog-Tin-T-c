@extends('admin.master')

@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit {{ $cate->name }}</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
       
      <form role="form" action="{{ route('cate.update', $cate->id) }}" method="post">
          @csrf
          @method('put')
          <input type="hidden" name="idCate" value="{{ $cate->id }}">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input value="{{ $cate->name }}" name="category" class="form-control" id="exampleInputEmail1" placeholder="Enter...">

            @error('category')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Parent Category</label>
            <select class="form-control" name="parent_id" id="">
              <option value="0">Parent</option>
              @php
                  showCategories($categories);
              @endphp
            </select>
          </div>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="is_menu" value="1" 
            {{ $cate->is_menu == 1 ? 'checked' : '' }}>
            <label for="customCheckbox1" class="custom-control-label">Display</label>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection

@php
    function showCategories($categories, $parent_id = 0, $char = '')
    {
      // $_GLOBALS['level'];
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id)
            { 
                echo '<option value="' .$item->id . '">'.$char.$item->name. '</option>';
                
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);
                
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories, $item->id, $char.' --');
            }
        }
    }
@endphp