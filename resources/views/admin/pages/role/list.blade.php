@extends('admin.master')

@section('content')
<div class="row mt-5">
  <div class="col-md-12">
    <div class="card">

      @include('admin.message._message')

      <div class="card-header">
        <h3 class="card-title">User Table</h3>

        <div class="card-tools">
          <a class="btn btn-success" href="{{ route('role.create') }}">Add Role <i class="fas fa-user-plus fa-fw"></i></a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Role Name</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $role->name }}</td>
                
                  <td><a href="{{ route('role.edit',$role->id) }}"><span class="fa fa-edit"></span></a></td>
                  <td>
                    <form id="delete-form-{{ $role->id }}" method="post" action="{{ route('role.destroy',$role->id) }}" style="display: none">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="" onclick="
                    if(confirm('Are you sure, You Want to delete this?'))
                        {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $role->id }}').submit();
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
              <th>Role Name</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </tfoot>
          
          
        </table>
        <div>
            {{ $roles->links() }}
          </div>
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
