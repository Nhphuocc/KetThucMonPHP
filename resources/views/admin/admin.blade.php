<title>Admin</title>
@extends('layouts.layouts')
@section('content')
        <div class="container mt-4">
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createBookModal">Thêm sách</button>
            </div>
            @include('book.add-modal', ['tacgia' => $danhsach_tacgia])
           <div class="container-fluid" >
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover ">
                    <thead class="table-dark text-center">
                        <tr>
                        <th>ID</th>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Nội Dung</th>
                        <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    </tr>
                    @foreach ($danhsach_sach as $home => $sach)
                        <tr>
                        <td>{{ $home + 1 }}</td>
                        <td>{{ $sach->ten_sach }}</td>
                        <td>{{ $sach->tacgia->name ?? 'Chưa có tác giả' }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailModal">
                                detail
                            </button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editBookModal{{$sach->id}}">Sửa</button>
                            <form action="{{route('deletebook',$sach->id)}}" style="display:inline;" method="POST" onsubmit="return confirm('Bạn chắc muốn xoá không?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Xóa</button>
                            </form>
                        </td>
                        </tr>
                        @include('book.detail')
                        @include('book.edit-modal', ['sach' => $sach, 'tacgia' => $danhsach_tacgia])
                    @endforeach
                </div>
            </div>
        </div>
@endsection
