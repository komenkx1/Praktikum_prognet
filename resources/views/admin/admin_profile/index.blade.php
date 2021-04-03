@extends('/admin/layouts/master',['title'=>'Profile'])
@section('content')

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Admin</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="/admin">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Profile</span></li>

            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <!-- start: page -->
    <div class="row">
        <div class="col">
            <section class="card">
                @include('admin/layouts/notif')
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h4>Profile</h4>
                </header>
                <div class="card-body">
                    <form action="{{Route('admin.profile.update',['admin'=>$adminUser->id])}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img id="blah" style="width: 100%x; height:300px; border-radius:5px;"
                                    src="{{$adminUser->image}}" alt="your image" />
                                <input name="profile_image" type='file' id="imgInp" class="d-block pt-2 mt-2 w-100" />
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <input readonly type="text"  value="{{$adminUser->role}}" class="form-control w-100">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" required value="{{$adminUser->name}}"
                                        class="form-control w-100">
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" required value="{{$adminUser->username}}"
                                        class="form-control w-100">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" required value="{{$adminUser->phone}}"
                                        class="form-control w-100">
                                </div>
                                <button class="btn btn-success float-right clearfix mt-3">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>

<!-- end: page -->
</section>

@endsection
@section('footer')
<script>
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
})
</script>
@endsection