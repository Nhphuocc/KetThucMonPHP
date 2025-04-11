<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sách mới</title>
</head>
<body>
    <h1>📚 Thêm sách mới</h1>

    <form method="POST" action="{{ route('createBook') }}">
        @csrf
        <div>
            <label for="ten_sach">Tên sách:</label>
            <input type="text" name="ten_sach" id="ten_sach" required>
        </div>
        <div>
            <label for="tacgia_id">Tác giả:</label>
            <select name="tacgia_id" class="w-full border px-3 py-2 rounded" required>
                @foreach ($tacgiaList as $tg)
                    <option value="{{ $tg->id }}">
                        {{ $tg->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="Noi_dung">Nội Dung</label>
            <textarea name="Noi_dung" id="Noi_dung" rows="5" cols="50"></textarea>
        </div>
        <button type="submit">➕ Thêm sách</button>
        @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </form>
    <a href="{{ route('admin') }}">⬅️ Quay lại trang admin</a>
</body>
</html>
