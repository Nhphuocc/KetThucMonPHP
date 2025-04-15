<title>User</title>
@extends('layouts.layouts')
@section('content')
          <div class="container-fluid" >
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover ">
                <thead class="table-dark text-center">
                    <tr>
                    <th>ID</th>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Phân quyền</th>
                    <th>Hành động</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                </tr>
                @foreach ($user as $index => $user)
                    <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->is_admin == 1 ? 'Quản trị viên' : 'Người dùng' }}</td>
                    <td>
                    <form action="{{route('deleteUser',$user->id)}}" style="display:inline;" method="POST" onsubmit="return confirm('Bạn chắc muốn xoá không?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Xóa người dùng</button>
                    </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
@endsection
