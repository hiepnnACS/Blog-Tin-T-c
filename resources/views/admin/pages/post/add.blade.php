@extends('admin.master')

@section('content')

<div class="row mt-3">
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Post</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
          
          @can('posts.publish', Auth::user())
          <div class="form-group">
            <label for="exampleInputEmail1">Show Post</label>
            <input type="checkbox" name="status" value="1">

            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          @endcan

          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input value="{{ old('title') }}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter...">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <textarea  name=content id="text" cols="30" rows="10">{{ old('text') }}</textarea>

            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

          </div>

          

          </div>
         
          <div class="form-group">
            <label>Danh Muc</label>
            <select class="custom-select" name="cate_id">

                @php showCategories($categories) @endphp

            </select>
            
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Ảnh</label>
            <div class="col-md-4">
                  <input type='file' id="inputFile" name="image" />
                  <img id="image_upload_preview" src=""
                   alt="your image" width="300"  />
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
</div>
@endsection

@php
    function showCategories($categories, $parent_id = 0, $char = '')
    {
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id)
            {

              echo '<option value="' .$item->id . '">'.$char.$item->name. '</option>';
                
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);
                
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories, $item->id, $char.' --',);
            }
        }
    }
@endphp

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>

@section('js_cate')
<script type="text/javascript">

  $(document).ready(function() {

  // Show preview image 
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });
 
  });
</script>

@endsection
