<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="detailModalTitle">Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p><strong>Tên sách:</strong> {{ $sach->ten_sach }}</p>
            <p><strong>Tác giả:</strong> {{ $sach->tacgia->name ?? 'Chưa có tác giả'}}</p>
            <p><strong>Mô tả:</strong> {!! nl2br(e($sach->Noi_dung)) !!}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
