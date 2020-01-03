@extends('admin.master')

@section('content')

 
    <div class="row">
      
      {{-- Page Size --}}
      <div class="col-md-3"><h2 class="text-truncate">Post Table</h2></div>
        <div class="">
        <div class="dataTables_length" id="example1_length">
          <form action="" method="get" id="filterForm" >
          <label>Show <select name="pagesize" id="page-size" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
            <option value="">Chọn</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
          </select> </label>
        </form>
        </div>
      </div>
      
      {{-- Search form --}}
      <div class="search-form mt-3 col-md-6">
        <form action="{{ route('post.index') }}" method="get">
          <div class="form-group ">
            <div class="row">
                <div class="col-md-6">
                 <input class="form-control" type="text" name="keyword" value="{{ $keyword }}" placeholder="tim kiem">
              </div>
              <div class="col-md-6"><button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button></div>
              </div>
            </div>
          </form>
        </div>    
    </div>
    

    <div class="col-md-12">

      <div class="card">
        
        @include('admin.message._message')
        
        <div class="card-header">
          {{-- <h3 class="card-title text-c">Post Table</h3> --}}
        
          @can('posts.create', Auth::user())
            <div class="card-tools">
              <a class="btn btn-success" href="{{ route('post.create') }}">Add Post <i class="fas fa-user-plus fa-fw"></i></a>
            </div>
          @endcan
          <div>
            {{ $post->links() }}
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
                          <td>
                            <form id="delete-form-{{ $p->id }}" method="post" action="{{ route('post.destroy',$p->id) }}" style="display: none">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                            </form>
                            <a href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                {
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $p->id }}').submit();
                                }
                                else{
                                  event.preventDefault();
                                }" ><span class="fa fa-trash"></span></a>
                          </td>
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

    $(document).ready(function () {
    $('#page-size').on('change', function() {
      
      $('#filterForm').submit();
    });
  });
  </script>

@endsection