<!DOCTYPE html>
{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Chỉnh sửa Blogs</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <!-- code database bắt đầu từ đây  -->
    @include('admin/partials.preloader')
    <div class="container-fluid" id="preloader">
        <h2 class="form-title">Chỉnh sửa Blogs</h2>
        <form action="{{ route('blog.update', ['id'=>$blog->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style="width:100%">
                        <input type="text" class="form-control form-control-sm py-4 px-3 mb-1" name="title" style="width: 100%;" placeholder="Tiêu đề" value="{{ $blog->title }}" />
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
                        <input type="text" class="form-control form-control-sm py-4 px-3 mb-1" name="author" style="width: 100%;" placeholder="Tác giả" value="{{ $blog->author }}" />
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
                        <div class="col-md-12">
                            <div class="row mt-3 mb-5" style="width:120px; height:120px">
                                <img src="{{ $blog->image }}" style="width:80%">
                            </div>
                        </div>
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
                            @if($blog->status == 1)
                                <option value=""> Trạng thái </option>
                                <option selected value="1"> Active </option>
                                <option value="2"> Disable </option>
                            @endif
                            @if($blog->status == 2)
                                <option value=""> Trạng thái </option>
                                <option value="1"> Active </option>
                                <option selected value="2"> Disable </option>
                            @endif
                            @if($blog->status == "")
                            <option value=""> Trạng thái </option>
                                <option value="1"> Active </option>
                                <option value="2"> Disable </option>
                            @endif
                    </select>
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
                        <textarea id="mytextarea" name="content_post" placeholder="Nội dung">{{ $blog->content_post }}</textarea>
                        
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
                        <button class="btn btn-primary">Cập nhật Blog</button>
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
<script type='text/javascript' src="{{URL::asset('backend/js/blog/main.js')}}"></script>





