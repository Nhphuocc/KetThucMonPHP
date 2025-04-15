<div class="modal fade" id="createBookModal" tabindex="-1" role="dialog" aria-labelledby="createBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="createBookModal">Thêm sách</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <form action="{{ route('addBook')}}" method="POST" >
                    @csrf
                    <div class="mb-4">
                        <label class="block" name="ten_sach">Tên sách</label>
                        <input type="text" name="ten_sach" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block">Tác giả</label>
                        <select name="tacgia_id" class="w-full border px-3 py-2 rounded" required>
                            @foreach ($danhsach_tacgia as $tg)
                                <option value="{{ $tg->id }}">{{ $tg->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block" class="Noi_dung">Nội Dung</label>
                        <input type="text" name="Noi_dung" class="w-full border px-3 py-2 rounded" required>
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
