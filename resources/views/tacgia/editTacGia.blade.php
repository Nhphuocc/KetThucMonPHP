@extends('layouts.layouts')
@section('content')
    <div class="modal fade" id="editTacGiaModal{{$tacgia->id}}" tabindex="-1" role="dialog" aria-labelledby="editTacGiaModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
        <form action="{{ route('editTacGia', $tacgia->id) }}" method="POST" class="modal-content">
            @csrf
            @method('PUT')
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editTacGiaModalLabel">Sửa tác giả</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Tên tác giả</label>
                    <input type="text" name="ten_tac_gia" class="form-control"
                        value="{{ $tacgia->ten_tac_gia }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày sinh</label>
                    <input type="date" name="ngay_sinh" class="form-control"
                        value="{{ $tacgia->ngay_sinh }}" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
            </div>
          </div>
        </div>
      </div>
@endsection
