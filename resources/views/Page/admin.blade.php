<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
    <a href="{{route('showaddbook')}}"><button>Thêm sách</button></a>
    <h2> Danh sách sách</h2>
            <table border="1" cellpadding="8">
            <tr>
                <th>STT</th>
                <th>Tên sách</th>
                <th>Tác giả</th>
                <th>Chi tiết</th>
                <th>Hành Động</th>
            </tr>
            @foreach ($danhsach_sach as $home => $sach)
                <tr>
                <td>{{ $home + 1 }}</td>
                <td>{{ $sach->ten_sach }}</td>
                <td>{{ $sach->tacgia->name ?? 'Chưa có tác giả' }}</td>
                <td><a href="{{ route('chitiet', $sach->id) }}">Chi Tiết</a></td>
                <td>
                    <form action="{{route('deletebook',$sach->id)}}" method="POST" onsubmit="return confirm('Bạn chắc muốn xoá không?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Xóa sách</button>
                    </form>
                    <button><a href="{{route('editbook',$sach->id)}}">Sửa</a></button>
                </td>
                </tr>
            @endforeach
            </table>

        <h2>Danh sách Tác giả</h2>
        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Tên tác giả</th>
                <th>Ngày sinh</th>
                <th>Hành Động</th>
            </tr>
            @foreach ($danhsach_tacgia as $admin => $tacgia)
                <tr>
                <td>{{ $tacgia->id }}</td>
                <td>{{ $tacgia->name }}</td>
                <td>{{ $tacgia->ngay_sinh }}</td>
                <td>
                    <form action="{{route('deletetacgia',$tacgia->id)}}" method="POST" onsubmit="return confirm('Bạn chắc muốn xoá không?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Xóa tác giả</button>
                    </form>
                </td>
                </tr>
            @endforeach
            </table>

</body>
</html>
