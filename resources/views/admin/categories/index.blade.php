@extends('layouts.admin');
@section('header')
	<h1>Post List</h1>
@endsection
@section('content')
@if(session()->has('notif'))
<div class="alert alert-danger">{{session()->get('notif')}}</div>
@endif
	<table class="table table-bodered">
		<thead >
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Slug</th>
				<th><a class="btn btn-success" href="{{ route('categories.create') }}"><i class="fa fa-plus"></i> &nbsp Thêm</a></th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$category->name}}</td>
					<td>{{$category->slug}}</td>
					<td>
						<a class="btn btn-info" href="{{route('editCategories',['id' => $category->id])}})"><i class="fa fa-pencil"></i></a>
						<a class="btn btn-danger" onclick="confirmRemove('{{route('desTroy', ['id'=>$category->id])}}')" href="javascript:;"><i class="fa fa-close"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
@section('js')
<script>
	function confirmRemove(url){
		bootbox.confirm({
		    message: "This is a confirm with custom button text and color! Do you like it?",
		    buttons: {
		        confirm: {
		            label: 'Yes',
		            className: 'btn-success'
		        },
		        cancel: {
		            label: 'No',
		            className: 'btn-danger'
		        }
		    },
		    callback: function (result) {
		        if ( result){
		        	window.location.href = url;
		        };
		    }
		});
	}
</script>
@endsection