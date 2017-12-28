@extends('layouts.admin')
@section('title', 'Sửa tag')
@section('content')
	<div class="col-md-6 col-md-offset-3">
		<form action="{{ route('tags.update', $tag->id) }}" method="post">
			{!!csrf_field()!!}
			<div class="form-group">
				<label for="">Tên thẻ tag</label>
				<input type="text" name="name" value="{{$tag->name}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Slug</label>
				<input type="text" name="slug" value="{{$tag->slug}}" class="form-control">
			</div>
			<button class="btn btn-success col-md-6 col-md-offset-3" type="submit">Save</button>
		</form>
	</div>
@stop