<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Tac Gia</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow rounded-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="mdi mdi-account-edit mr-2"></i> Chỉnh sửa Tác Giả
                        </h5>
                        <a href="{{ route('admin') }}" class="btn btn-sm btn-light text-dark">
                            <i class="mdi mdi-arrow-left"></i> Quay lại
                        </a>
                    </div>

                    <div class="card-body p-4">
                        {{-- Hiển thị lỗi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-sm">
                                <ul class="mb-0 pl-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Form sửa tác giả --}}
                        <form action="{{ route('updateTacGia', $tacgia->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="tentacgia" class="font-weight-bold">Tên tác giả</label>
                                <input
                                    type="text"
                                    name="tentacgia"
                                    id="tentacgia"
                                    class="form-control form-control-lg"
                                    value="{{ $tacgia->tentacgia ?? '' }}"
                                    placeholder="Nhập tên tác giả..."
                                    required
                                >
                            </div>

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-success btn-lg px-4">
                                    <i class="mdi mdi-content-save mr-1"></i> Lưu thay đổi
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer bg-light text-center small text-muted">
                        © {{ date('Y') }} Quản lý thư viện Laravel
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
