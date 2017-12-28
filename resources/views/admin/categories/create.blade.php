@extends('layouts.admin')

@section('header')
	
@endsection
@section('content')
	<form action="{{ route('categories.store') }}" method="post">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Tên danh mục:</label>
			<input type="text" class="form-control" name="name" placeholder="Nhập tên....">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Thêm mới</button>
		</div>

	</form>
@endsection