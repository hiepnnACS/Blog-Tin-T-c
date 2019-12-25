@extends('admin.master')

@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Category</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
       
      <form role="form" action="{{ route('cate.store') }}" method="post">
          @csrf
        
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="category" class="form-control" id="exampleInputEmail1" placeholder="Enter...">
            @if($errors->count() > 0)
                <p class="text-danger">{{ $errors->first('category') }}</p>
            @endif
          </div>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="is_menu" value="1">
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