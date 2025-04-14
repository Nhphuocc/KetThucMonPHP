<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-semibold mb-4">📝 Chỉnh sửa sách</h1>
    <form method="POST" action="{{ route('updatebook', $sach->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block">Tên sách</label>
            <input type="text" name="tenmoi" value="{{ old('tensach', $sach->ten_sach) }}" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block">Tác giả</label>
            <select name="tacgia_id" class="w-full border px-3 py-2 rounded" required>
                @foreach ($tacgiaList as $tg)
                    <option value="{{ $tg->id }}" @if($tg->id == $sach->tacgia_id) selected @endif>
                        {{ $tg->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded" >💾 Cập nhật</button>
            <a href="{{ route('admin') }}" class="bg-gray-300 px-4 py-2 rounded">🔙 Quay lại</a>
        </div>
    </form>
</div>
</body>
</html>
