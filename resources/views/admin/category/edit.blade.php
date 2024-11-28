@extends('layouts.app')

@section('content')

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
       @include('layouts.header')
        <!-- End Topbar header -->
       
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
       @include('layouts.sidebar')
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row py-4">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Category</h3>
                    </div>
                    <div class="col-4 align-self-center">
                        <div class="customize-input float-right">
                            <a href="{{route('category')}}" class="btn btn-primary btn-rounded">Back</a>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="container py-4">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form  action="{{ route('storeCategory') }}" name="editCategory" id="editCategory" enctype="multipart/form-data" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6"> 
                                                <label>Edit Category</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                                                <input type="hidden" name="id" value="{{$cat->id}}" class="form-control" value="">
                                                <div class="form-group">
                                                    <input type="text" name="name" value="{{$cat->name}}" class="form-control" placeholder="enter catrgory">
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group"> 
                                                    <label>Detail</label>
                                                    <input type="text" name="detail" value="{{$cat->detail}}" class="form-control" placeholder="enter detail">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="parent_id">Parent Category</label>
                                                <select class="form-control @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                                                    <option value="">Select Parent Category</option>
                                                    @foreach ($categories as $val)
                                                        <option value="{{ $cat->id }}" {{ $cat->parent_id == $val->id ? 'selected' : '' }}>{{ $val->name }}</option>
                                                        @foreach ($val->children as $subCat)
                                                            <option value="{{ $subCat->id }}" {{ $cat->parent_id == $subCat->id ? 'selected' : '' }}> - {{ $subCat->name }}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                                @error('parent_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" id="submitCategory" name="submitCategory" class="btn btn-info">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
     

            <!-- footer -->
           @include('layouts.footer')
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- ============================================================== -->
</body>
<script>
     $("body").on("click","#submitCategory",function(e){
    $(this).parents("form").ajaxForm(options);
  });


  var options = { 
    complete: function(response) 
    {
        if($.isEmptyObject(response.responseJSON.error)){
            alert('Image Upload Successfully.');
        }else{
            alert(response.responseJSON.error);
        }
    }
  };


  function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
  }

      
       
</script>
</html>
    </div>
</div>
@endsection