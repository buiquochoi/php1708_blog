@extends('layouts.admin')
@section('title', 'Edit Categories');
@section('box-tit')
	{{-- expr --}}
	Edit Categories
@endsection
@section('content')
	{{-- expr --}}
	<div class="col-md-6 col-md-offset-3">
		<form action="{{ route('editSave') }}" method="post">
			{!!csrf_field()!!}
			<input type="hidden" value="{{$cate->id}}" name="id">
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" value="{{$cate->name}}" name="name" class="form-control">
			</div>
			@if ($errors->has('name'))
                    <span class="help-block " style="color: red;">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
			<div class="form-group">
				<label for="">Slug</label>
				<input type="text" value="{{$cate->slug}}" name="slug" class="form-control">
			</div>
			<button class="btn btn-success col-md-12" type="submit">Edit</button>
		</form>
	</div>
@endsection