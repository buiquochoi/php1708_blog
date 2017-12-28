@extends('layouts.admin')
@section('content')
	{{-- expr --}}
<h2>Danh sách bài viết</h2>
@if(session()->has('notif'))
<div class="alert alert-danger">{{session()->get('notif')}}</div>
@endif
<table class="table table-hover">
	<thread>
		<tr>
			<th>#</th>
			<th>Ảnh</th>
			<th>Title</th>
			<th>Danh mục</th>
			<th><a href="{{ route('posts.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add</a></th>
		</tr>
	</thread>
	<tbody>
		@foreach ($posts as $post)
			{{-- expr --}}
			<tr>
				<td>{{$post->id}}</td>
				<td><img src="{!!asset($post->featured)!!}" width="120" alt=""></td>
				<td>{{$post->title}}</td>
				<td>{{$post->category->name}}</td>
				<td>
					<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
					<a class="btn btn-danger" onclick="confirmRemove('{{route('posts.destroy', ['id'=>$post->id])}}')" href="javascript:;">Delete</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div class="col-md-8 col-md-offset-2">
	{{$posts->links()}}
</div>
@stop

@section('js')
	{{-- expr --}}
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