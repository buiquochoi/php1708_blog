@extends('layouts.admin')

@section('title','Danh sách thẻ Tags')


@section('content')
	<div class="col-md-4">
		<form action="{{ route('tags.store') }}" method="post" id="formTag" >
			{!!csrf_field()!!}
			<div class="form-group">
				<label for="">Tên tag</label>
				<input type="text" class="form-control" name="name" placeholder="Tên tag ... ">
				@if ($errors->has('name'))
					{{$errors->first('name')}}
				@endif
			</div>
			<button type="submit" class="btn btn-success">Thêm thẻ tags</button>
		</form>
	</div>
	<div class="col-md-8">
		<table class="table table-hover">
			<thread>
				<tr>
					<th>ID</th>
					<th>Tên tag</th>
					<th>Đường dẫn</th>
					<th>Lựa chọn</th>
				</tr>
			</thread>
			<tbody>
				@foreach ($tags as $tag)
					{{-- expr --}}
					<tr>
						<td>{{$tag->id}}</td>
						<td>{{$tag->name}}</td>
						<td>{{$tag->slug}}</td>
						<td>
							<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
							<a href="" class="btn btn-danger"><i class="fa fa-times"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
			<div class="col-md-8 col-md-offset-2">
				{{$tags->links()}}
			</div>
		</table>
	</div>
@endsection
@section('js')
	{{-- expr --}}
	<script>
		$(document).ready(function() {
			$('#formTag').validate({
				rules: {
					name: {
						required: true,
						minlength: 2
					}
				},
				messages: {
					name: {
						required: "không được để trống trường này",
						minlength: "Độ dài phải lớn hơn 2 ký tự"
					}
				}
			});
		});
	</script>
@endsection