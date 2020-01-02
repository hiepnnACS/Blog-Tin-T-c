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

          @can('posts.create', Auth::user())
            <div class="card-tools">
              <a class="btn btn-success" href="{{ route('post.create') }}">Add Post <i class="fas fa-user-plus fa-fw"></i></a>
            </div>
          @endcan
          
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
                  <input type="hidden" name="id" id="url{{ $p->id }}" value="{{ $p->id }}">
                    <td>{{ $loop->index + 1 }}
                    <td class="td-title">{{ $p->title }}
                    <td class="td-content">{{ Str::limit($p->content, 200) }}</td>
                    <td><img class="img-thumnail" width="100" src="{{ asset('img/upload/post/'. $p->image) }}" alt=""></td>
                    <td>{{ $p->views }}</td>
                    <td>{{ $p->category->name }}</td>
                    <td>{{ $p->status == 1 ? 'Hiển thị' : 'Không Hiển Thị' }}</td>
                    <td class="btn-post">
                        @can('posts.update', Auth::user())
                          <a href="{{ route('post.edit', $p->id) }} ">
                              <i class="fa fa-edit"></i>
                          </a>
                        @endcan
                        
                        @can('posts.delete', Auth::user())
                          <a href="{{ route('post.destroy', $p->id) }}" data-method="delete" class="jquery-postback">
                              <i class="fa fa-trash"></i>
                          </a>
                        @endcan
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

@section('js_post')
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', 'a.jquery-postback', function(e) {
        e.preventDefault(); // does not go through with the link.
        
        var $this = $(this);
        var parent = $(this).parent();
        $.post({
            type: $this.data('method'),
            url: $this.attr('href')
        }).done(function (data) {
            alert('success');
            parent.closest("tr").remove();
            console.log(data);
        });
    });
  </script>
  <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 2000);
  </script>
@endsection