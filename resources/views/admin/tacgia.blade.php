<title>Tác Giả</title>
@extends('layouts.layouts')
@section('content')
          <div class="container mt-4">
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createTacGiaModal">Thêm tác giả</button>
            </div>
            @include('tacgia.add-modal')
          <div class="container-fluid" >
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover ">
                <thead class="table-dark text-center">
                    <tr>
                    <th>ID</th>
                    <th>Tên tác giả</th>
                    <th>Ngày sinh</th>
                    <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                </tr>
            @foreach ($danhsach_tacgia as $tacgia)
                <tr>
                <td>{{ $tacgia->id }}</td>
                <td>{{ $tacgia->name }}</td>
                <td>{{ $tacgia->ngay_sinh }}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editTacGiaModal{{$tacgia->id}}">Sửa</button>
                    <form action="{{route('deletetacgia',$tacgia->id)}}" style="display:inline;" method="POST" onsubmit="return confirm('Bạn chắc muốn xoá không?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Xóa tác giả</button>
                    </form>
                </td>
                </tr>
                @include('tacgia.edit-modal')
            @endforeach
@endsection


