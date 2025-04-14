<div class="modal fade" id="editBookModal{{$sach->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm sách</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('editSach', $sach->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block">Tên sách</label>
                    <input type="text" name="ten_sach" value="{{old('tensachcu', $sach->ten_sach) }}" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block">Tác giả</label>
                    <select name="tacgia_id" class="w-full border px-3 py-2 rounded" required>
                        @foreach ($tacgia as $tg)
                            <option value="{{ $tg->id }}" @if($tg->id == $sach->tacgia_id) selected @endif>
                                {{ $tg->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
    </div>
</div>
