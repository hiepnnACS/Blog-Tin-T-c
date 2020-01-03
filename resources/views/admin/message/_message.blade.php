@if (session('success'))
	<div class="alert alert-success alert-dismissible">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	  <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
	  {{ session('success') }}
	</div>
@endif