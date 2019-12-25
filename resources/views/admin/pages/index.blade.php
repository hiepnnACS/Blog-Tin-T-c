@extends('admin.master') 

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users Table</h3>

          <div class="card-tools">
            <button class="btn btn-success" data-toggle="modal" 
         data-target="#addUser">Add User <i class="fas fa-user-plus fa-fw"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Type</th>
              <th>Action</th>
            </tr>
            <tr >
              <td>dsfasf</td>
              <td>gadsfdsafds</td>
              <td>fsafdassd</td>
              <td>gsdfgdsfgfd</td>
              <td>gsdfgdsfgsdf</td>
              <td>
                  <a href="">
                      <i class="fa fa-edit"></i>
                  </a>
                  |
                  <a href="">
                      <i class="fa fa-trash"></i>
                  </a>
              </td>
            </tr>
            <tr >
              <td>dsfasf</td>
              <td>gadsfdsafds</td>
              <td>fsafdassd</td>
              <td>gsdfgdsfgfd</td>
              <td>gsdfgdsfgsdf</td>
              <td>
                  <a href="">
                      <i class="fa fa-edit"></i>
                  </a>
                  |
                  <a href="">
                      <i class="fa fa-trash"></i>
                  </a>
              </td>
            </tr>
            <tr >
              <td>dsfasf</td>
              <td>gadsfdsafds</td>
              <td>fsafdassd</td>
              <td>gsdfgdsfgfd</td>
              <td>gsdfgdsfgsdf</td>
              <td>
                  <a href="">
                      <i class="fa fa-edit"></i>
                  </a>
                  |
                  <a href="">
                      <i class="fa fa-trash"></i>
                  </a>
              </td>
            </tr>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection