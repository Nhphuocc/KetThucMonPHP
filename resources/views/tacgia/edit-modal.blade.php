<div class="modal fade" id="editTacGiaModal{{$tacgia->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa tác giả</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form method="POST" action="{{route('editTacGia',$tacgia->id)}}">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="mb-4">
                <label class="block">Tên tác giả</label>
                <input type="text" name="name" value="{{ old('tacgiacu', $tacgia->name) }}" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Ngày Sinh</label>
                <input type="date" name="ngay_sinh" value="{{ old('ngaysinhcu', $tacgia->ngay_sinh) }}" class="w-full border px-3 py-2 rounded" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
</div>
