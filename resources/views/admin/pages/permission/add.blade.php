@extends('admin.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Add Permission</h3>
          </div>

          {{-- @include('includes.messages') --}}
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('permission.store') }}" method="post">
          {{ csrf_field() }}
          {{-- @method('patch') --}}
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
              <div class="form-group">
                <label for="name">Permission Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="{{ old('name') }}">
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              </div>
              <div class="form-group">
                <label for="">Permission for</label>
                <select name="for" id="" class="form-control">
                  <option value="user">User</option>
                  <option value="post">Post</option>
                  <option value="other">Other</option>
                </select>
              </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href='{{ route('permission.index') }}' class="btn btn-warning">Back</a>
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
<!-- /.content-wrapper -->
@endsection

