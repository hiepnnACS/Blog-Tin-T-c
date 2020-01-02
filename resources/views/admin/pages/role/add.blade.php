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
            <h3 class="box-title">Add Role</h3>
          </div>

          {{-- @include('includes.messages') --}}
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('role.store') }}" method="post">
          {{ csrf_field() }}
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
              <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="{{ old('name') }}">
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              </div>
             
            <div class="row">
              <div class="col-md-4">
                <label for="">Posts Permission</label>
                @foreach($permissions as $permissison)
                  @if($permissison->for == 'post')
                  <div class="checkbox">
                    <label><input type="checkbox" name="permission[]" value="{{ $permissison->id }}">{{ $permissison->name }}</label>
                  </div>
                  @endif
                @endforeach
              </div>
              <div class="col-md-4">
                <label for="">Users Permission</label>
                @foreach($permissions as $permissison)
                  @if($permissison->for == 'user')
                  <div class="checkbox">
                    <label><input type="checkbox" name="permission[]" value="{{ $permissison->id }}">{{ $permissison->name }}</label>
                  </div>
                  @endif
                @endforeach
              </div>
              <div class="col-md-4">
                <label for="">Other Permission</label>
                @foreach($permissions as $permissison)
                  @if($permissison->for == 'other')
                  <div class="checkbox">
                    <label><input type="checkbox" name="permission[]" value="{{ $permissison->id }}">{{ $permissison->name }}</label>
                  </div>
                  @endif
                @endforeach
              </div>
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
<!-- /.content-wrapper -->
@endsection

