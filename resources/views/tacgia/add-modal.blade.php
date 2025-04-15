<div class="modal fade" id="createTacGiaModal" tabindex="-1" role="dialog" aria-labelledby="createTacGiaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="createTacGiaModal">Thêm tác giả</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <form action="{{route('addTacGia')}}" method="POST" >
                    @csrf
                    <div class="mb-4">
                        <label class="block" name="name">Tên tác giả</label>
                        <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block" class="ngay_sinh">Ngày Sinh</label>
                        <input type="date" name="ngay_sinh" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
