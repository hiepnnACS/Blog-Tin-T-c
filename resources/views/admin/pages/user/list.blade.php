@extends('admin.master')

@section('content')
<div class="row mt-5">
  <div class="col-md-12">
    <div class="card">

      @include('admin.message._message')

      <div class="card-header">
        <h3 class="card-title">User Table</h3>

        <div class="card-tools">
          <a class="btn btn-success" href="{{ route('user.create') }}">Add User <i class="fas fa-user-plus fa-fw"></i></a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>S.No</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Assigned Roles</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @foreach ($user->roles as $role)
                    {{ $role->name }},
                  @endforeach
                </td>
                <td>{{ $user->status? 'Active' : 'Not Active' }}</td>
                  <td><a href="{{ route('user.edit',$user->id) }}"><span class="fa fa-edit"></span></a></td>
                  <td>
                    <form id="delete-form-{{ $user->id }}" method="post" action="{{ route('user.destroy',$user->id) }}" style="display: none">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="" onclick="
                        if(confirm('Are you sure, You Want to delete this?'))
                        {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $user->id }}').submit();
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
              <th>User Name</th>
              <th>Assigned Roles</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </tfoot>
          
        </table>
        <div>
          {{ $users->links() }}
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
