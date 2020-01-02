@extends('admin.master')

@section('content')
<div class="row mt-5">
  <div class="col-md-12">
    <div class="card">
      @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
      @endif
      <div class="card-header">
        <h3 class="card-title">Permission Table</h3>

        <div class="card-tools">
          <a class="btn btn-success" href="{{ route('permission.create') }}">Add permission <i class="fas fa-user-plus fa-fw"></i></a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Permission Name</th>
              <th>Permission For</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($permissions as $permission)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->for }}</td>
                
                  <td><a href="{{ route('permission.edit',$permission->id) }}"><span class="fa fa-edit"></span></a></td>
                  <td>
                    <form id="delete-form-{{ $permission->id }}" method="post" action="{{ route('permission.destroy',$permission->id) }}" style="display: none">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="" onclick="
                    if(confirm('Are you sure, You Want to delete this?'))
                        {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $permission->id }}').submit();
                        }
                        else{
                          event.preventDefault();
                        }" ><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>S.No</th>
              <th>Permission Name</th>
              <th>Permission For</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </tfoot>
          
          
        </table>
        <div>
          {{-- {{ $users->links() }} --}}
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
