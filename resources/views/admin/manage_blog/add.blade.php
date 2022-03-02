<!DOCTYPE html>
{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Thêm Blog</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <!-- code database bắt đầu từ đây  -->
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <h2 class="form-title">Thêm Blog</h2>
        <form action="{{ URL::to('admin/blogs/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style="width:100%">
                        <input type="text" class="form-control form-control-sm py-4 px-3 mb-1" name="title" style="width: 100%;" placeholder="Tiêu đề" value="{{ old('title') }}" />
                    </div>
                    @php         
                        $err_title = Session::get('title_null');
                        if($err_title){
                            echo "<div class='alert alert-danger'>";
                                echo $err_title;
                            echo "</div>";
                            Session::put('title_null', null);
                        }
                    @endphp
                    
                    <div class="form-group" style="width:100%">
                        <input type="text" class="form-control form-control-sm py-4 px-3 mb-1" name="author" style="width: 100%;" placeholder="Tác giả" value="{{old('author')}}" />
                    </div>
                    @php         
                        $err_author = Session::get('author_null');
                        if($err_author){
                            echo "<div class='alert alert-danger'>";
                                echo $err_author;
                            echo "</div>";
                            Session::put('author_null', null);
                        }
                    @endphp

                    <div class="form-group">
                        <label for="background">Chọn ảnh bìa</label>
                        <input class="form-control-file" type="file" id="background" name="background">
                    </div>
                    @php         
                        $image_null = Session::get('image_null');
                        if($image_null){
                            echo "<div class='alert alert-danger'>";
                                echo $image_null;
                            echo "</div>";
                            Session::put('image_null', null);
                        }
                    @endphp
        
                    <div class="form-group">
                        <select name="status" class="form-control input-xs" style="width:30%">
                            <option value=""> Trạng thái </option>
                            <option value="1"> Active </option>
                            <option value="2"> Disable </option>
                        </select>
                    </div>
                    @php         
                        $status_null = Session::get('status_null');
                        if($status_null){
                            echo "<div class='alert alert-danger'>";
                                echo $status_null;
                            echo "</div>";
                            Session::put('status_null', null);
                        }
                    @endphp
                </div>
                <div class="col-md-12">
                    <div class="form-group" >
                        <textarea id="mytextarea" name="content_post" placeholder="Nội dung">{{old('content_post')}}</textarea>
                        
                    </div>
                    @php         
                        $content_null = Session::get('content_null');
                        if($content_null){
                            echo "<div class='alert alert-danger'>";
                                echo $content_null;
                            echo "</div>";
                            Session::put('content_null', null);
                        }
                    @endphp
                
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary">Thêm Blog</button>
                        <a href="{{ asset('admin/blogs/index')}}" class="btn btn-secondary">Huỷ</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- kết thúc code ở đây  -->
@endsection
<script src="{{URL::asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({ selector: '#mytextarea'});</script>
{{-- <script src="{{URL::asset('backend/js/tags.js')}}"></script> --}}
<script type='text/javascript'>
    $(document).ready(function(){
        $('.active_blogs_sliderbar').addClass('active');
    });
</script>




