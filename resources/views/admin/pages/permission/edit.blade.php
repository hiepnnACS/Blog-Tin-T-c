@extends('admin.master')

@section('content')
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Permission</h3>
          </div>

          {{-- @include('includes.messages') --}}
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('role.update', $permission->id) }}" method="post">
          {{ csrf_field() }}
          @method('put')
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
              <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="{{ $permission->name }}">
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Permission for</label>
                <select name="for" id="" class="form-control">
                  
                  <option value="user" @if($permission->for == 'user') selected  @endif>User</option>
                  <option value="post" @if($permission->for == 'post') selected  @endif>Post</option>
                  <option value="other" @if($permission->for == 'other') selected  @endif>Other</option>
                </select>
              </div>  

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href='{{ route('role.index') }}' class="btn btn-warning">Back</a>
            </div>
              
            </div>
        
      </div>

          </form>
        </div>
        <!-- /.box -->

        
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
@endsection
