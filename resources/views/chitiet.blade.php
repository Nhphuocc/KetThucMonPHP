<h2>📖 Chi tiết sách</h2>

<p><strong>Tên sách:</strong> {{ $sach->ten_sach }}</p>
<p><strong>Tác giả:</strong> {{ $sach->tacgia->name ?? 'Chưa có tác giả'}}</p>
<p><strong>Mô tả:</strong> {!! nl2br(e($sach->Noi_dung)) !!}</p>

<a href="{{ route('home') }}">← Quay lại danh sách</a>

