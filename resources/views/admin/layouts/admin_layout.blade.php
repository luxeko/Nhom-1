<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @yield('title')
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="{{ URL::asset('backend/vendor/fontawesome-free/css/all.min.css') }} " rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="{{ URL::asset ('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset ('backend/css/admin.css')}}" rel="stylesheet">
        <link href="{{ URL::asset('backend/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="icon" href="{{ URL::asset('/frontend/img/logoteam.png'); }}">
    </head>
    <body id="page-top">
        {{-- message khi đăng nhập thành công  --}}
        {{-- @include('admin/partials.message_login') --}}
        <!-- Page Wrapper -->
        <div id="wrapper">
            @include('admin/partials.sliderbar')

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    @include('admin/partials.header')                   
                    <!-- code database bắt đầu từ đây  -->
                    @yield('content')
                    <!-- kết thúc code ở đây  -->
                        
                </div>
                <!-- End of Main Content -->
                @include('admin/partials.footer')
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
            
        @include('admin/partials.message_logout')

        
        {{-- kết nối đến js loading page  --}}
        <script type="text/javascript" src={{URL::asset('backend/js/layout.js')}}></script>
        <script type="text/javascript" src={{URL::asset('backend/js/loading.js')}}></script>
        <script type="text/javascript" src={{URL::asset('backend/js/scroll_top.js')}}></script>
        <script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{URL::asset('backend/vendor/select2/dist/js/select2.min.js')}}"></script>
        {{-- plugin confirm jquery  --}}
        <script src={{URL::asset('backend/js/sweetalert2@11.js')}}></script>
        <!-- Bootstrap core JavaScript-->
        <script src="{{URL::asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{URL::asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{URL::asset('backend/js/sb-admin-2.min.js')}}"></script>
        <!-- Page level plugins -->
        <script src="{{URL::asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>   
        <script>
            $(document).ready(function(){
                var showMes = $('.cancel_btn').click(function(){
                    $('.confirm_form').hide()
                    $('.confirm_container').hide()
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $('#preloader').hide(0).delay(1200).show(0);
            });
        </script>
        @livewireScripts
    </body>
</html>
