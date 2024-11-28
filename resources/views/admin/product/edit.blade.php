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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Product</h3>
                    </div>
                    <div class="col-4 align-self-center">
                        <div class="customize-input float-right">
                            <a href="{{route('product')}}" class="btn btn-primary btn-rounded">Back</a>
                        </div>
                    </div>
                    
                </div>
            </div>
    
            <div class="container py-4">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <form name="addProduct" id="addProduct" enctype="multipart/form-data" > -->
                                <form action="{{ route('storeProduct') }}" enctype="multipart/form-data" method="POST"> 
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6"> 
                                                <label>Product</label>
                                                <div class="form-group">
                                                <input type="hidden" name="id" value="{{$product->id}}" class="form-control" >
                                                    <input type="text" name="name" value="{{$product->name}}"  class="form-control" placeholder="enter catrgory">
                                                </div>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="col-md-6">
                                                <div class="form-group"> 
                                                    <label>Detail</label>
                                                    <input type="text" name="detail" value="{{$product->detail}}" class="form-control" placeholder="enter detail">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="categories">Categories</label>
                                                    <select class="form-control @error('categories') is-invalid @enderror" id="categories" name="categories[]" multiple required>
                                                        @foreach ($cat as $category)
                                                            <option value="{{ $category->id }}" {{ in_array($category->id, $productCategories) ? 'selected' : '' }}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('categories')
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
                                            <button type="submit" id="submitProduct" name="submitProduct" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
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
     $("body").on("click","#submitProduct",function(e){
    $(this).parents("form").ajaxForm(options);
  });


  var options = { 
    complete: function(response) 
    {
        if($.isEmptyObject(response.responseJSON.error)){
            alert('Image Upload Successfully.');
        }else{
            printErrorMsg(response.responseJSON.error);
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
