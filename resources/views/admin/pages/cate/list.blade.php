@extends('admin.master')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
      <div class="card">
        @if (session('success'))
          <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="card-header">
          <h3 class="card-title">Category Table</h3>

          <div class="card-tools">
            <a class="btn btn-success" href="{{ route('cate.create') }}">Add Category <i class="fas fa-user-plus fa-fw"></i></a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tr>
              <th>STT</th>
              <th>Name</th>
              <th>Hiển Thị Trang Chủ</th>
              <th>Action</th>
            </tr>
            @foreach($cate as $c)
                <tr >
                    <td>{{ $loop->index + 1 }}
                    <td>{{ $c->name }}
                    <td>{{ $c->is_menu == 1 ? 'Hiển thị' : 'Không Hiển Thị' }}</td>
                    <td class="btn-cate">
                        <a href="{{ route('cate.edit', $c->id) }} " class="btn btn-primary ">
                            Edit <i class="fa fa-edit"></i>
                        </a>
                        
                        <form class="form-" action="{{ route('cate.destroy', $c->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <input class="btn btn-danger" value="Delete" type="submit" />
                        </form>
                    </td>
                </tr>
            @endforeach

          </table>
          <div>
            {{ $cate->links() }}
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection