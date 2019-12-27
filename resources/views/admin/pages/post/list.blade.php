@extends('admin.master')

@section('content')

<div class="row mt-5">
    <div class="col-md-12">
      <div class="card">
        @if (session('success'))
          <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="card-header">
          <h3 class="card-title">Post Table</h3>

          <div class="card-tools">
            <a class="btn btn-success" href="{{ route('post.create') }}">Add Post <i class="fas fa-user-plus fa-fw"></i></a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <thead>
              <th>STT</th>
              <th>Title</th>
              <th>Content</th>
              <th>Image</th>
              <th>View</th>
              <th>Danh mục</th>
              <th>Hiển Thị</th>
              <th>Action</th>
            </thead>
            @foreach($post as $p)
                <tr >
                    <td>{{ $loop->index + 1 }}
                    <td class="td-title">{{ $p->title }}
                    <td class="td-content">{!! Str::limit($p->content, 200) !!}</td>
                    <td><img class="img-thumnail" width="100" src="{{ asset('img/upload/post/'. $p->image) }}" alt=""></td>
                    <td>{{ $p->views }}</td>
                    <td>{{ $p->category->name }}</td>
                    <td>{{ $p->status == 1 ? 'Hiển thị' : 'Không Hiển Thị' }}</td>
                    <td class="btn-post">
                        <a href="{{ route('post.edit', $p->id) }} ">
                             <i class="fa fa-edit"></i>
                        </a>
                        |
                        <a href="{{ route('post.edit', $p->id) }} ">
                             <i class="fa fa-trash"></i>
                        </a>
                        
                        {{-- <form class="form-" action="{{ route('post.destroy', $p->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <input class="btn btn-danger" value="Delete" type="submit" />
                        </form> --}}
                    </td>
                </tr>
            @endforeach

          </table>
          <div>
            {{ $post->links() }}
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection