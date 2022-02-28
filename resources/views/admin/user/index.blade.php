{{-- Các bước để tạo khung trang Dashboard --}}

{{-- Bước 1: @extends('admin/layouts.admin_layout') --}}
@extends('admin/layouts.admin_layout')

{{-- Bước 2: Đặt tên cho title  --}}
@section('title')
    <title>Trang chủ</title>
@endsection

{{-- Bước 3: Viết code cần show data ở sau thẻ div  --}}
@section('content')
    <div class="container-fluid">
        <!-- code database bắt đầu từ đây  -->
        <div class="row">
            <div class="col-md-12">
                {{-- <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2"> Add</a> --}}
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Username</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)

                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->username }}</td>

                            {{-- <td>
                                <a href=""
                                   class="btn btn-default">Edit</a>
                                <a href=""
                                   data-url="{{ route('users.delete', ['id' => $user->id]) }}"
                                   class="btn btn-danger action_delete">Delete</a>

                            </td> --}}
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{ $users->links() }}
            </div>

        <!-- kết thúc code ở đây  -->
    </div>
    
@endsection

