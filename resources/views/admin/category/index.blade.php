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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Category</h3>
                    </div>
                    <div class="col-4 align-self-center">
                        <div class="customize-input float-right">
                            <a href="{{route('add-category')}}" type="button" class="btn btn-primary btn-rounded"><i class="fas fa-plus px-2"></i>Add Category</a>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
             @endif
            <div class="container py-4">
                <table class="table table-bordered">
                    <thead class= "">
                        <tr>
                            <th class="bg-primary text-white">Name</th>
                            <th class="bg-primary text-white">Description</th>
                            <th class="bg-primary text-white" width="300px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($data) && $data->count())
                            @foreach($data as $key => $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->detail }}</td>
                                    <td>
                                    <a type="button" href="{{route('edit-category', ['id' => $value->id])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
                                    <a type="button" href="{{route('delete-category', ['id' => $value->id])}}" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">There are no data.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                    
                {!! $data->links() !!}
            </div>
     

            <!-- footer -->
           @include('layouts.footer')
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- ============================================================== -->
</body>

</html>
    </div>
</div>
@endsection
