<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h2> Danh sách sách</h2>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
            <table border="1" cellpadding="8">
            <tr>
                <th>STT</th>
                <th>Tên sách</th>
                <th>Tác giả</th>
                <th>Chi tiết</th>
            </tr>
            @foreach ($danhsach as $home => $sach)
                <tr>
                <td>{{ $home + 1 }}</td>
                <td>{{ $sach->ten_sach }}</td>
                <td>{{ $sach->tacgia->name ?? 'Chưa có tác giả' }}</td>
                <td><a href="{{ route('chitiet', $sach->id) }}">Chi Tiết</a></td>
                </tr>
            @endforeach
            </table>


</body>
</html>
