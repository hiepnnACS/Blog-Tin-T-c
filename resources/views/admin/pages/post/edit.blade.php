@extends('admin.master')

@section('content')
<div class="row mt-3">
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Post</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="card-body">
          <div class="form-group">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="exampleInputEmail1">Title</label>
            <input value="{{ $post->title }}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter...">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <span class="text-danger"></span>
            <textarea  name=content id="text" cols="30" rows="10">{{ $post->content }}</textarea>

            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
          </div>
          <div class="form-group">
            <label>Danh Muc</label>
            <select class="custom-select" name="category">
              <option value="0">Parent</option>

                @php 
                  showCategories($cate) 
                @endphp
                
            </select>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Ảnh</label>
            <div class="col-md-4">
              <span class="text-danger">{{ $errors->first('image') }}</span>
                  <input type='file' id="inputFile" name="image"  class="form-control"/>
                  <img id="image_upload_preview"
                  src="
                  @if($post->image == "")
                    http://placehold.it/100x100
                  @else 
                    {{ asset('img/upload/post/'.$post->image) }}
                  @endif
                  "
                   alt="your image" width="300" />
            </div>
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
                showCategories($categories, $item->id, $char.' --');
            }
        }
    }
@endphp

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