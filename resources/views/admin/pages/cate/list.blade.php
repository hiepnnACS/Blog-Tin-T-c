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
              <th>Name</th>
              <th>Cấp </th>
              <th>Hiển Thị Trang Chủ</th>
              <th>Action</th>
            </tr>
            
               @php  
                  showCategories($cate) 
               @endphp

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

@php
    function showCategories($categories, $parent_id = 0, $char = '', $level = 0)
    {
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id)
            {
              echo '<tr>';
                // echo '<td>' . $loop->index + 1. '</td>';
                echo '<td>' . $char. $item->name. '</td>';
                echo '<td>' . $level . '</td>';
                echo '<td>' . $item->show_menu . '</td>';
                echo '<td class="btn-cate">' ;
                        echo '<a href=" '.route('cate.edit', $item ->id).'" class="btn btn-primary ">
                                  Edit <i class="fa fa-edit"></i>
                              </a>';
                        echo '<form class="form-" action=" '.route('cate.destroy', $item->id).'" method="post">
                                '.csrf_field().'
                                <input type="hidden" name=" _method" value="delete" />
                                <input class="btn btn-danger" value="Delete" type="submit" />
                              </form>';
                echo '</td>';

              echo '</tr>';
                
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);
                
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories, $item->id, $char.'|---', $level + 1);
            }
        }
    }
@endphp